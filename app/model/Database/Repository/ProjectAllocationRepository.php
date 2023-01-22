<?php

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\ProjectAllocation;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\QueryBuilder;

/**
 * @method ProjectAllocation|NULL find($id, ?int $lockMode = null, ?int $lockVersion = null)
 * @method ProjectAllocation|NULL findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectAllocation[] findAll()
 * @method ProjectAllocation[] findBy(array $criteria, array $orderBy = null, ?int $limit = null, ?int $offset = null)
 * @extends AbstractRepository<ProjectAllocation>
 */
class ProjectAllocationRepository extends AbstractRepository
{
	public function findByNotDeleted(): QueryBuilder
	{
		return $this->createQueryBuilder('ar')
			->andWhere('ar.deleted = 0')
		;
	}

	/**
	 * Counts hours of allocatoins for user in project
	 * @param int $projectId
	 * @param int $userId
	 * @return int
	 */
	public function countAllocation(int $projectId, int $userId): int
	{
		$qb = $this->findByNotDeleted();
		$qb
			->select('COUNT(ar.id) as count_allocation')
			->resetDQLPart('from')
			->from($this->getEntityName(), 'ar', 'ar.id')
			->add(
				'where', $qb->expr()->andX(
				$qb->expr()->eq('ar.project', $projectId),
				$qb->expr()->eq('ar.user', $userId),
			)
			)
		;


		$result = $qb->getQuery()->getResult(AbstractQuery::HYDRATE_ARRAY);
		return $result[0]['count_allocation'];
	}

	public function findByUser(int $userId): QueryBuilder
	{
		$qb = $this->findByNotDeleted();
		$qb->where('ar.user = :userId')
			->setParameter("userId", $userId)
		;

		return $qb;
	}
}
