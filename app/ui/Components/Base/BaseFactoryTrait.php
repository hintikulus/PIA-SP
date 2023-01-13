<?php

namespace App\UI\Components\Base;

use App\Model\Database\EntityManager;
use Contributte\Translation\Translator;
use Nette\Security\User;

trait BaseFactoryTrait
{
	private EntityManager $em;

	private User $user;

	private Translator $translator;

	public function __construct(EntityManager $em, User $user, Translator $translator) {
		$this->em = $em;
		$this->user = $user;
		$this->translator = $translator;
	}
}
