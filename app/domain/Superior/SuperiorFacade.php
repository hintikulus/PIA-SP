<?php

namespace App\Domain\Superior;

use App\Model\Database\EntityManager;
use Doctrine\ORM\QueryBuilder;

class SuperiorFacade
{
	private EntityManager $em;

	public function __construct(
		EntityManager $em,
	)
	{
		$this->em = $em;
	}

	public function getQueryBuilderForSuperiorGrid(int $superiorId): QueryBuilder
	{
		$qb = $this->em->getUserSuperiorUserRepository()->findBySuperior($superiorId);
		$qb->addSelect("(SELECT SUM(pa.allocation) FROM App\Model\Database\Entity\ProjectAllocation pa WHERE pa.deleted = 0 AND pa.user = sur.user) AS allocation_sum");
		$qb->addSelect("sur.id");
		return $qb;
	}

}
