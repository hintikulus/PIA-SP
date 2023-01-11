<?php

namespace App\UI\Components\User;

use App\Model\Database\EntityManager;
use App\UI\Components\Sign\SignInForm;
use Nette\Security\User;

class UserGridFactory
{

	private EntityManager $em;
	public function __construct(EntityManager $em) {
		$this->em = $em;
	}


	public function create(): UserGrid
	{
		return new UserGrid($this->em);
	}
}
