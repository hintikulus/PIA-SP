<?php

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\UserSuperiorUser;
use Doctrine\ORM\QueryBuilder;

/**
 * @method UserSuperiorUser|NULL find($id, ?int $lockMode = null, ?int $lockVersion = null)
 * @method UserSuperiorUser|NULL findOneBy(array $criteria, array $orderBy = null)
 * @method UserSuperiorUser[] findAll()
 * @method UserSuperiorUser[] findBy(array $criteria, array $orderBy = null, ?int $limit = null, ?int $offset = null)
 * @extends AbstractRepository<UserSuperiorUser>
 */
class UserSuperiorUserRepository extends AbstractRepository
{
	public function findByNotDeleted(): QueryBuilder
	{
		return $this->createQueryBuilder('sur')
			->andWhere('sur.deleted = 0')
		;
	}

	public function findBySuperior(int $userId): QueryBuilder
	{
		return $this->findByNotDeleted();
	}

}
