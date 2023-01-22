<?php

namespace App\Domain\Base;

use App\Model\Database\EntityManager;

class BaseFacade
{
	protected EntityManager $em;

	public function __construct(
		EntityManager $em,
	)
	{
		$this->em = $em;
	}
}
