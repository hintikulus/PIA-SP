<?php declare(strict_types = 1);

namespace App\Model\Database\Repository;

use App\Model\Database\Entity\ProjectAllocation;
use App\Model\Database\Entity\User;
use Doctrine\ORM\QueryBuilder;

/**
 * @method User|NULL find($id, ?int $lockMode = null, ?int $lockVersion = null)
 * @method User|NULL findOneBy(array $criteria, array $orderBy = null)
 * @method User[] findAll()
 * @method User[] findBy(array $criteria, array $orderBy = null, ?int $limit = null, ?int $offset = null)
 * @extends AbstractRepository<User>
 */
class UserRepository extends AbstractRepository
{
	public function findByNotDeleted(): QueryBuilder
	{
		return $this->createQueryBuilder('ur')
			->andWhere('ur.deleted = 0')
		;
	}

	public function findOneByEmail(string $email): ?User
	{
		return $this->findOneBy(['email' => $email, 'deleted' => 0]);
	}

	/**
	 * @return string[]
	 */
	public function findByNotDeletedPairs(): array
	{
		$qb = $this->createQueryBuilder('ur')
			->select('CONCAT(ur.firstname, \' \', ur.lastname, \' (\', ur.login, \')\'), ur.id')
			->resetDQLPart('from')
			->from($this->getEntityName(), 'ur', 'ur.id')
			->andWhere('ur.deleted = 0')
			->addOrderBy('ur.lastname')
			->addOrderBy('ur.firstname')
		;

		return array_map(function($row) {
			return reset($row);
		}, $qb->getQuery()->getArrayResult());
	}

}
