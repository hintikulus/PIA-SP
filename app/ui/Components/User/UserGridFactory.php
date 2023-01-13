<?php

namespace App\UI\Components\User;

use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseFactoryTrait;
use App\UI\Components\Sign\SignInForm;
use Nette\Localization\Translator;
use Nette\Security\User;

class UserGridFactory
{

	use BaseFactoryTrait;

	public function create(): UserGrid
	{
		return new UserGrid($this->em, $this->user, $this->translator);
	}
}
