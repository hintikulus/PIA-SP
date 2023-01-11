<?php

namespace App\UI\Components\Sign;

use App\UI\Form\BaseForm;
use Nette\Security\User;

class SignInFormFactory
{

	private User $user;
	public function __construct(User $user) {
		$this->user = $user;
	}


	private function create(): SignInForm
	{
		return new SignInForm($this->user);
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
