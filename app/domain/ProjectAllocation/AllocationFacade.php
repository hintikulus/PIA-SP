<?php

namespace App\Domain\ProjectAllocation;

use App\Model\App;
use App\Model\Database\Entity\ProjectAllocation;
use App\Model\Database\EntityManager;
use App\Model\Utils\DateTime;
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

	public function get(int $id): ?ProjectAllocation
	{
		return $this->em->getProjectAllocationRepository()->find($id);
	}

	public function getQueryBuilderForMyAllocationGrid(int $userId): QueryBuilder
	{
		return $this->em->getProjectAllocationRepository()->findByUser($userId);
	}

	public function getQueryBuilderForProjectAllocationGrid(int $projectId)
	{
		return $this->em->getProjectAllocationRepository()->findByNotDeleted()
			->andWhere("ar.project = :projectId")
			->setParameter("projectId", $projectId);
	}

	public function create(array $data): AllocationFacadeResult
	{
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

		$this->em->persist($allocation);
		$this->em->flush();

		return new AllocationFacadeResult();

	}

	public function edit(array $data): AllocationFacadeResult
	{
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

	public static function getAggregationData(QueryBuilder $qb): array
	{
		$result = $qb->select('SUM(ar.allocation) as allocation_sum')
			->getQuery()->getArrayResult()
		;
		$sum = $result[0]['allocation_sum'];

		return [
			'allocation_sum'    => round($sum, 2),
			'allocationFTE_sum' => round($sum / App::FTE, 2),
		];
	}

	public function getQueryBuilderForUserChooseAllocationGrid(int $projectId): QueryBuilder
	{
		$qb = $this->em->getUserRepository()->findByNotDeleted();

		//$qb->addSelect('');
		//$qb->select('(SELECT COUNT(alr.id) FROM ' . ProjectAllocation::class . ' alr WHERE alr.user = ur.id) AS allocation_sum');
		//$qb->addSelect('(SELECT SUM(par.allocation) FROM ' . ProjectAllocation::class. ' par WHERE par.user = 1 AND par.state = :state AND par.deleted = 0) AS allocation_sum');
		//$qb->setParameter("state", ProjectAllocation::STATE_ACTIVE);
		//$qb->setParameter("now", new DateTime());
		$qb->leftJoin(ProjectAllocation::class, "par", Join::WITH, "par.user = ur.id");
		$qb->groupBy('ur.id');
		$qb->addSelect('SUM(par.allocation) AS allocation_sum');
		$qb->addSelect('ur.id');
		return $qb;
	}

	public function findByNotProject(int $projectId): QueryBuilder {
		$qb = $this->em->getUserRepository()->findByNotDeleted()
		->addSelect('SUM(par.allocation) AS allocation_sum');
		$qb->leftJoin(ProjectAllocation::class, "pa", "WITH", 'pa.user = ur.id AND pa.project = :prj');
		$qb->setParameter("prj", $projectId);
		$qb->andWhere("pa.project IS NULL");
		$qb->groupBy('ur.id');

		return $qb;
	}

	public function getUserAllocationSum(int $userId): float
	{
		return $this->em->getProjectAllocationRepository()
				   ->findByNotDeleted()
				   ->where("ar.user = :user")
				   ->setParameter("user", $userId)
				   ->getQuery()->getArrayResult()[0]['allocation_sum'];

	}

	public static function convertHoursToFTE(float $hours)
	{
		return round($hours / App::FTE, 2);
	}

	public static function convertFTEToHours(float $xfte)
	{
		return round($xfte * App::FTE, 2);
	}
}
