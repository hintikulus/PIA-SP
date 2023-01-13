<?php

namespace App\UI\Components\Sign;

use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseFactoryTrait;
use App\UI\Form\BaseForm;
use Contributte\Translation\Translator;
use Nette\Security\User;

class SignInFormFactory
{
	use BaseFactoryTrait;

	private function create(): SignInForm
	{
		return new SignInForm($this->em, $this->user, $this->translator);
	}

	public function forFrontend(): SignInForm
	{
		return $this->create();
	}

	public function forBackend(): SignInForm
	{
		return $this->create();
	}

}
