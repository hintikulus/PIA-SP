<?php

namespace App\UI\Components\Sign;

use App\UI\Components\Base\BaseComponent;
use App\Model\App;
use App\Model\Exception\Runtime\AuthenticationException;
use App\UI\Form\BaseForm;
use Nette\Application\UI\Form;
use Nette\Security\User;

class SignInForm extends BaseComponent
{
	public function render($params = null)
	{
		parent::render($params);
	}

	public function createComponentForm(): Form
	{
		$form = new BaseForm();
		$form->addText('email')
			->setRequired(true)
		;
		$form->addPassword('password')
			->setRequired(true)
		;
		$form->addCheckbox('remember')
			->setDefaultValue(true)
		;
		$form->addSubmit('submit');
		$form->onSuccess[] = [$this, 'processLoginForm'];

		return $form;
	}

	public function processLoginForm(BaseForm $form): void
	{
		try
		{
			$this->presenter->user->setExpiration($form->values->remember ? '14 days' : '20 minutes');
			$this->presenter->user->login($form->values->email, $form->values->password);
		}
		catch (AuthenticationException $e)
		{
			$form->addError('Invalid username or password');

			return;
		}

		$this->presenter->redirect(App::DESTINATION_AFTER_SIGN_IN);
	}
}
