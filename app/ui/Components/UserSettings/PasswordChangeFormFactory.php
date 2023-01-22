<?php

namespace App\UI\Components\UserSettings;

use App\Model\Database\EntityManager;
use App\Model\Database\Repository\UserRepository;
use App\Model\Security\Passwords;
use App\UI\Components\Base\BaseFactoryTrait;
use App\UI\Components\User\UserGrid;
use App\UI\Form\BaseForm;
use Contributte\Translation\Translator;
use Nette\Security\User;

interface PasswordChangeFormFactory
{
	public function create(): PasswordChangeForm;
}
