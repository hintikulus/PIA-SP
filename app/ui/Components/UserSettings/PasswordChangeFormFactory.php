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

class PasswordChangeFormFactory
{

	use BaseFactoryTrait;
	private EntityManager $em;
	private Translator $translator;
	private Passwords $passwords;
	private User $user;

	public function __construct(
		EntityManager $em,
		Translator $translator,
		Passwords $passwords,
		User $user,
	) {
		$this->em = $em;
		$this->translator = $translator;
		$this->passwords = $passwords;
		$this->user = $user;
	}


	public function create(): PasswordChangeForm
	{
		return new PasswordChangeForm($this->em, $this->user, $this->translator, $this->passwords);
	}
}
