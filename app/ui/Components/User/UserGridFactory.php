<?php

namespace App\UI\Components\User;

use App\Model\Database\EntityManager;
use App\UI\Components\Sign\SignInForm;
use Nette\Localization\Translator;
use Nette\Security\User;

class UserGridFactory
{

	private EntityManager $em;
	private Translator $translator;

	public function __construct(EntityManager $em, Translator $translator) {
		$this->em = $em;
		$this->translator = $translator;
	}


	public function create(): UserGrid
	{
		return new UserGrid($this->em, $this->translator);
	}
}
