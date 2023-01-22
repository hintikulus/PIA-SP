<?php

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\Workspace;

/**
 * @method Workspace|NULL find($id, ?int $lockMode = NULL, ?int $lockVersion = NULL)
 * @method Workspace|NULL findOneBy(array $criteria, array $orderBy = NULL)
 * @method Workspace[] findAll()
 * @method Workspace[] findBy(array $criteria, array $orderBy = NULL, ?int $limit = NULL, ?int $offset = NULL)
 * @extends AbstractRepository<Workspace>
 */
class WorkspaceRepository extends AbstractRepository
{
	public function findByNotDeleted()
	{
		return $this->createQueryBuilder('wr')
			->andWhere('wr.deleted = 0')
		;
	}
}
