<?php

namespace App\UI\Components\UserSettings;

use App\Model\Database\EntityManager;
use App\Model\Security\Passwords;
use App\UI\Components\Base\BaseComponent;
use App\UI\Form\BaseForm;
use Contributte\Translation\Translator;
use Nette\Application\UI\Form;
use Nette\Security\User;
use Nette\Utils\ArrayHash;

class PasswordChangeForm extends BaseComponent
{
	private EntityManager $em;

	private Translator $translator;

	private Passwords $passwords;

	private User $user;

	public function __construct(
		EntityManager $em, Translator $translator, Passwords $passwords, User $user,
	)
	{
		$this->em = $em;
		$this->translator = $translator;
		$this->passwords = $passwords;
		$this->user = $user;
	}

	public function createComponentForm(): BaseForm
	{
		$form = new BaseForm();
		$form->addPassword("old_password", "Staré heslo");//->setRequired();
		$form->addPassword("new_password", "Nové heslo");//->setRequired();
		$form->addPassword("new_password_again", "Nové heslo (znovu)");//->setRequired();
		$form->addSubmit("submit");

		$form->onValidate[] = [$this, "onValidate"];
		$form->onSuccess[] = [$this, "onSuccess"];

		return $form;
	}

	public function onValidate(Form $form, ArrayHash $values)
	{
		if ($values['new_password'] != $values['new_password_again'])
		{
			$form->addError("Nové heslo se neshoduje.");
		}

		$userEntity = $this->em->getUserRepository()->find($this->user->getId());

		if (!$this->passwords->verify($values['old_password'], $userEntity->getPasswordHash()))
		{
			$form->addError("Aktuální heslo nesouhlasí.");
		}
	}

	public function onSuccess(Form $form)
	{
		$values = $form->getValues();

		$userEntity = $this->em->getUserRepository()->find((int)$this->user->getId());

		$userEntity->changePasswordHash($this->passwords->hash($values['new_password']));

		$this->em->persist($userEntity);
		$this->em->flush();
	}
}
