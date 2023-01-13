<?php

namespace App\UI\Components\User;

use App\UI\Components\Base\BaseFactoryTrait;

class UserFormFactory
{
	use BaseFactoryTrait;

	public function create(): UserForm
	{
		return new UserForm($this->em, $this->user, $this->translator);
	}
}
