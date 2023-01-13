<?php

namespace App\UI\Components\User;

use App\UI\Components\Base\BaseComponent;
use App\UI\Form\BaseForm;

class UserForm extends BaseComponent
{
	public function createComponentForm(): BaseForm
	{
		$form = new BaseForm();

		$form->addText("login", "Orion přihlašovací jméno");

		$form->addText("firstname", "Křestní jméno");

		$form->addText("lastname", "Příjmení");

		$form->addSelect('workspace', "Oddělení", $this->em->getWorkspaceRepository()->findPairs('id', 'name', []));

		$form->addSubmit("submit");

		return $form;
	}
}
