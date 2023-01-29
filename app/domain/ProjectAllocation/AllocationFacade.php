<?php

namespace App\Domain\ProjectAllocation;

use App\Model\App;
use App\Model\Database\Entity\ProjectAllocation;
use App\Model\Database\EntityManager;
use App\Model\Utils\DateTime;
use Cassandra\Date;
use Doctrine\DBAL\Cache\ArrayResult;
use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;

class AllocationFacade
{
	private EntityManager $em;

	public function __construct(
		EntityManager $em,
	)
	{
		$this->em = $em;
	}

	/**
	 * Získání enetity ProjectAllocation o zadaném identifikátoru
	 * @param int $id
	 * @return ProjectAllocation|null
	 */
	public function get(int $id): ?ProjectAllocation
	{
		return $this->em->getProjectAllocationRepository()->find($id);
	}

	/**
	 * Vytvoří instanci dotazu pro výpis alokací zadaného uživatele
	 * @param int $userId
	 * @return QueryBuilder
	 */
	public function getQueryBuilderForMyAllocationGrid(int $userId): QueryBuilder
	{
		return $this->em->getProjectAllocationRepository()->findByUser($userId);
	}

	/**
	 * Vytvoří instanci dotazu pro výpis alokací zadaného projektu
	 * @param int $projectId
	 * @return QueryBuilder
	 */
	public function getQueryBuilderForProjectAllocationGrid(int $projectId)
	{
		return $this->em->getProjectAllocationRepository()->findByNotDeleted()
			->andWhere("ar.project = :projectId")
			->setParameter("projectId", $projectId)
		;
	}

	/**
	 * Vytvoření nové alokace s daty z formuláře
	 * @param mixed[] $data
	 * @return AllocationFacadeResult
	 */
	public function create(array $data): AllocationFacadeResult
	{
		bdump($data);
		//Získání entity projektu
		$project = $this->em->getProjectRepository()->find($data['project_id']);

		// Získání entity uživatele
		$user = $this->em->getUserRepository()->find($data['user_id']);

		// Overeni o existenci obou entit?
		if ($project == null || $user == null)
		{
			return new AllocationFacadeResult(false, AllocationFacadeResult::ENTITY_NOT_FOUND);
		}

		/*
		// Kontrola uživatel můžem mít jen 1 ukol
		if ($this->em->getProjectAllocationRepository()->countAllocation($project->getId(), $user->getId()) > 0)
		{
			return new AllocationFacadeResult(false, AllocationFacadeResult::ERROR_USER_ALREADY_EXISTS);
		}
		*/

		$allocation = new ProjectAllocation($user, $project);

		$allocation->setAllocation($data['allocation']);
		$allocation->setTimespanFrom($data['timespan_from']);
		$allocation->setTimespanTo($data['timespan_to']);
		$allocation->setState($data['state']);
		$allocation->setDescription($data['description']);

		if ($allocation->getState() === ProjectAllocation::STATE_ACTIVE)
			if ($this->isUserAllocationExceededWith($user->getId(), $allocation->getAllocation(), $allocation->getTimespanFrom(), $allocation->getTimespanTo()))
			{
				return new AllocationFacadeResult(false, AllocationFacadeResult::ERROR_USER_ALLOCATION_EXEEDED);
			}

		$this->em->persist($allocation);
		$this->em->flush();

		return new AllocationFacadeResult();

	}

	/**
	 * Úprava alokace na základě dat z formuláře
	 * @param mixed[] $data
	 * @return AllocationFacadeResult
	 */
	public function edit(array $data): AllocationFacadeResult
	{
		bdump($data);
		$allocation = $this->em->getProjectAllocationRepository()->find($data['allocation_id']);

		if ($allocation == null)
		{
			return new AllocationFacadeResult(false, AllocationFacadeResult::ENTITY_NOT_FOUND);
		}

		$allocation->setAllocation($data['allocation']);
		$allocation->setTimespanFrom($data['timespan_from']);
		$allocation->setTimespanTo($data['timespan_to']);
		$allocation->setState($data['state']);
		$allocation->setDescription($data['description']);

		$this->em->persist($allocation);
		$this->em->flush();

		return new AllocationFacadeResult();
	}

	/**
	 * Odstranění alokace o zadaném identifikátoru
	 * @param int $id
	 * @return AllocationFacadeResult
	 */
	public function delete(int $id): AllocationFacadeResult
	{
		$allocation = $this->get($id);

		if ($allocation == null)
		{
			return new AllocationFacadeResult(false, AllocationFacadeResult::ENTITY_NOT_FOUND);
		}

		$allocation->setDeleted();

		$this->em->persist($allocation);
		$this->em->flush();

		return new AllocationFacadeResult();
	}

	/**
	 * Získání agregovaných dat alokací ze zadaného dotazu
	 * @param QueryBuilder $qb
	 * @return mixed[]
	 */
	public static function getAggregationData(QueryBuilder $queryBuilder): array
	{
		$qb = clone $queryBuilder;
		$result = $qb->select('SUM(ar.allocation) as allocation_sum')
			->getQuery()->getArrayResult()
		;
		$sum = $result[0]['allocation_sum'] ?? 0;

		$result = $qb->select('SUM(ar.allocation) as allocation_sum')
			->andWhere('ar.state = :state')->andWhere('(ar.timespan_to IS NULL OR ar.timespan_to > :now)')
			->setParameter('state', ProjectAllocation::STATE_ACTIVE)
			->setParameter('now', new \Nette\Utils\DateTime())
			->getQuery()->getArrayResult()
		;
		$sumActive = $result[0]['allocation_sum'] ?? 0;

		return [
			'allocation_sum'           => round($sum, 2),
			'allocationFTE_sum'        => round($sum / App::FTE, 2),
			'allocation_active_sum'    => round($sumActive, 2),
			'allocationFTE_active_sum' => round($sumActive / App::FTE, 2),
		];
	}

	/**
	 * Získání dotazu pro získání uživatelů pro vytváření nové alokace
	 * @param int $projectId
	 * @return QueryBuilder
	 */
	public function getQueryBuilderForUserChooseAllocationGrid(int $projectId): QueryBuilder
	{
		$qb = $this->em->getUserRepository()->findByNotDeleted();
		$qb->leftJoin(ProjectAllocation::class, "par", Join::WITH, "par.user = ur.id");
		$qb->groupBy('ur.id');
		$qb->addSelect('SUM(par.allocation) AS allocation_sum');
		$qb->addSelect('ur.id');
		return $qb;
	}

	/**
	 * Vytvoření dotazu pro získání uživatelů, kteří nemají přiřazený zadaný projekt.
	 * @param int $projectId
	 * @return QueryBuilder
	 */
	public function findByNotProject(int $projectId): QueryBuilder
	{
		$qb = $this->em->getUserRepository()->findByNotDeleted()
			->addSelect('SUM(par.allocation) AS allocation_sum')
		;
		$qb->leftJoin(ProjectAllocation::class, "pa", "WITH", 'pa.user = ur.id AND pa.project = :prj');
		$qb->setParameter("prj", $projectId);
		$qb->andWhere("pa.project IS NULL");
		$qb->groupBy('ur.id');

		return $qb;
	}

	/**
	 * Získá součet všech alokací zadaného uživatele
	 * @param int $userId
	 * @return float
	 */
	public function getUserAllocationSum(int $userId): float
	{
		return $this->em->getProjectAllocationRepository()
				   ->findByNotDeleted()
				   ->where("ar.user = :user")
				   ->setParameter("user", $userId)
				   ->getQuery()->getArrayResult()[0]['allocation_sum'];

	}

	/**
	 * Ověření, zda při přidání zadané alokace uživatel nepřidá
	 * @param int $userId
	 * @param ProjectAllocation $projectAllocation
	 * @return bool
	 */
	public function isUserAllocationExceededWith(int $userId, float $allocation, DateTime $timespan_from, ?DateTime $timespan_to): bool
	{
		$timespan = [
			'timespan_from' => $timespan_from,
			'timespan_to'   => $timespan_to,
		];

		$from = $this->getUserSortedAllocation('timespan_from', $timespan, $allocation, $userId);
		$to = $this->getUserSortedAllocation('timespan_to', $timespan, $allocation, $userId);

		// Převedení řetězců datumů na instanci datumů
		foreach ($from as $key => $value)
		{
			$from[$key]['timespan_from'] = DateTime::from($value['timespan_from']);
		}
		foreach ($to as $key => $value)
		{
			$to[$key]['timespan_to'] = DateTime::from($value['timespan_to']);
		}

		return $this->processExceededVerification($from, $to);
	}

	/**
	 * Provede iteraci nad alokacemi pro ověření, zda v některém momentu neprobíhá alokace nad FTE
	 * @param array $from
	 * @param array $to
	 * @return bool
	 */
	public function processExceededVerification(array $from, array $to)
	{
		$i = 0;
		$j = 0;
		$fromSize = count($from);
		$toSize = count($to);

		$allocation = 0;

		bdump($from);
		bdump($to);

		while (true)
		{
			// Zastavovaci podminka cyklu
			if ($i >= $fromSize && $j >= $toSize)
			{
				break;
			}

			if ($i >= $fromSize)
			{
				$allocation -= $to[$j]['allocation'];
				$j++;
			}
			else if ($j >= $toSize)
			{
				$allocation += $from[$i]['allocation'];
				$i++;
			}
			else if ($from[$i]['timespan_from'] < $to[$j]['timespan_to'])
			{
				$allocation += $from[$i]['allocation'];
				$i++;
			}
			else
			{
				$allocation -= $to[$j]['allocation'];
				$j++;
			}

			bdump("KONTROLA: " . $allocation);
			if ($allocation > App::FTE)
			{
				bdump("CONFLICT");
				return true;
			}
		}

		bdump("NO PROBLEM");
		return false;
	}

	/**
	 * @param string $column
	 * @param DateTime $timespan
	 * @param int $allocation
	 * @param int $userId
	 * @return mixed[]
	 * @throws \Doctrine\DBAL\Exception
	 */
	public function getUserSortedAllocation(string $column, array $timespan, int $allocation, int $userId, int $allocationId = null): array
	{
		$enteredDatetimeSql = 'UNION SELECT :date AS ' . $column . ', :alloc AS allocation';

		if ($column === 'timespan_to' && $timespan['timespan_to'] === null)
		{
			$enteredDatetimeSql = 'AND pa.timespan_to IS NOT NULL';
		}

		if ($timespan['timespan_to'] !== null)
		{
			$wherePart = 'pa.timespan_from < :timespan_to AND (pa.timespan_to IS NULL OR pa.timespan_to > :timespan_from)';
		}
		else
		{
			$wherePart = '(pa.timespan_to IS NULL OR pa.timespan_to > :timespan_from)';
		}

		$statement = $this->em->getConnection()->prepare(
			'(SELECT pa.' . $column . ', pa.allocation FROM ' . 'project_allocation' . ' pa
			WHERE pa.user_id = :user AND pa.state = :status AND pa.id != :id AND ' . $wherePart . '
			' . $enteredDatetimeSql . ') ORDER BY ' . $column . ' IS NOT NULL,' . $column . ' ASC'
		);

		// Dosazení hodnot pojmenovaných parametrů
		$statement->bindValue("timespan_from", $timespan['timespan_from']);
		$statement->bindValue("user", $userId, ParameterType::INTEGER);
		$statement->bindValue("status", 'active');
		$statement->bindValue('id', $allocationId ?? 0);

		if ($timespan['timespan_to'] !== null)
		{
			$statement->bindValue("timespan_to", $timespan['timespan_to']);
		}

		if ($column !== 'timespan_to' || $timespan['timespan_to'] !== null)
		{
			$statement->bindValue("date", $timespan[$column]);
			$statement->bindValue("alloc", $allocation, ParameterType::INTEGER);
		}


		//bdump($statement->executeQuery());
		return $statement->executeQuery()->fetchAllAssociative();
	}

	/**
	 * Převod velikosti alokace z hodin/týdně na násobek FTE
	 * @param float $hours
	 * @return float
	 */
	public static function convertHoursToFTE(float $hours)
	{
		return round($hours / App::FTE, 2);
	}

	/**
	 * Převod velikosti alokace z násobnku FTE na hodiny týdně
	 * @param float $xfte
	 * @return float
	 */
	public static function convertFTEToHours(float $xfte)
	{
		return round($xfte * App::FTE, 2);
	}
}
