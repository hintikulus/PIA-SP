<?php

namespace App\UI\Components\Workspace;

use App\Model\Database\Entity\Workspace;
use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseComponent;
use App\UI\Form\BaseForm;
use Contributte\Translation\Translator;
use Nette\Forms\Form;
use Nette\Neon\Entity;
use Nette\Security\User;
use Nette\Utils\ArrayHash;

class WorkspaceForm extends BaseComponent
{
	private ?int $id = null;

	public function __construct(
		protected EntityManager                       $em,
		protected User                                $user,
		protected Translator $translator,
		?int                                          $workspaceId = null,
	)
	{
		$this->id = $workspaceId;
	}

	public function render($params = null)
	{
		if ($this->id !== null)
		{
			$workspace = $this->em->getWorkspaceRepository()->find($this->id);
			bd($workspace);

			if ($workspace !== null)
			{
				$defaults = [
					'name' => $workspace->getName(),
					'shortcut' => $workspace->getShortcut(),
				];

				$this['form']->setDefaults($defaults);
			}
		}
		parent::render($params);
	}

	public function createComponentForm(): BaseForm
	{
		$form = new BaseForm();
		$form->addHidden('id', $this->id);

		$form->addText("name", "Název")
			->setRequired()
		;
		$form->addText("shortcut", "Zkratka")
			->setRequired()
		;

		$form->addSubmit("submit", "Uložit");

		$form->onSuccess[] = [$this, 'onSuccess'];

		return $form;
	}

	public function onSuccess(Form $form, ArrayHash $values)
	{
		if(empty($values['id'])) {
			$workspace = new Workspace($values['name'], $values['shortcut']);
		} else {
			$workspace = $this->em->getWorkspaceRepository()->find($values['id']);
			$workspace->setName($values['name']);
			$workspace->setShortcut($values['shortcut']);
		}

		$this->em->persist($workspace);
		$this->em->flush();
		$this->presenter->redirect(":list");

	}
}
