<?php

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\Project;
use Doctrine\ORM\QueryBuilder;

/**
 * @method Project|NULL find($id, ?int $lockMode = null, ?int $lockVersion = null)
 * @method Project|NULL findOneBy(array $criteria, array $orderBy = null)
 * @method Project[] findAll()
 * @method Project[] findBy(array $criteria, array $orderBy = null, ?int $limit = null, ?int $offset = null)
 * @extends AbstractRepository<Project>
 */
class ProjectRepository extends AbstractRepository
{
	public function findByNotDeleted(): QueryBuilder
	{
		return $this->createQueryBuilder('pr')
			->andWhere('pr.deleted = 0')
		;
	}

	public function findByProjectManager(int $userId): QueryBuilder
	{
		$qb = $this->findByNotDeleted();
		$qb->andWhere('pr.projectManager = :userId')
			->setParameter("userId", $userId)
		;

		return $qb;
	}
}
