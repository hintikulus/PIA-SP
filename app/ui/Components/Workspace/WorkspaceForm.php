<?php

namespace App\UI\Components\Workspace;

use App\Domain\Workspace\WorkspaceFacade;
use App\Model\Database\Entity\Workspace;
use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseComponent;
use App\UI\Form\BaseForm;
use Contributte\Translation\Translator;
use Nette\Application\LinkGenerator;
use Nette\Forms\Form;
use Nette\Neon\Entity;
use Nette\Security\User;
use Nette\Utils\ArrayHash;

class WorkspaceForm extends BaseComponent
{
	public $onSave;
	public $onCancel;

	private ?int $id = null;

	private WorkspaceFacade $workspaceFacade;


	public function __construct(
		WorkspaceFacade $workspaceFacade,
		LinkGenerator   $linkGenerator,
		User            $user,
		Translator      $translator,
		?int            $id = null,
	)
	{
		$this->id = $id;
		$this->workspaceFacade = $workspaceFacade;
		$this->user = $user;
		$this->translator = $translator;
		$this->linkGenerator = $linkGenerator;
	}

	/**
	 * Úprava možností vykreslení
	 * Metoda naplní výchozí hodnoty formuláře
	 * @param mixed|null $params
	 * @return void
	 */
	public function render(mixed $params = null): void
	{
		bdump($this->translator);
		if ($this->id !== null)
		{
			$workspace = $this->workspaceFacade->get($this->id);

			if ($workspace !== null)
			{
				$defaults = [
					'name'     => $workspace->getName(),
					'shortcut' => $workspace->getShortcut(),
				];

				$this['form']->setDefaults($defaults);
			}
		}
		parent::render($params);
	}

	/**
	 * Vytvoření komponenty formuláře
	 * @return BaseForm
	 */
	public function createComponentForm(): BaseForm
	{
		$translator = $this->translator->createPrefixedTranslator('admin.workspace');

		$form = new BaseForm();
		$form->addHidden('id', $this->id);

		// Název oddělení
		$form->addText("name", $translator->translate("attributes.name"))
			->setRequired()
			->setHtmlAttribute("placeholder", $translator->translate("form.placeholders.name"))
		;

		// Zkratka oddělení
		$form->addText("shortcut", $translator->translate("attributes.shortcut"))
			->setRequired()
			->setHtmlAttribute("placeholder", $translator->translate("form.placeholders.shortcut"))
		;

		$form->addSubmit("submit", $this->translator->translate("base.saveButton"));

		$form->onSuccess[] = [$this, 'onSuccess'];

		return $form;
	}

	/**
	 * Metoda spuštěná po úspěšném odeslání formuláře
	 * @param Form $form
	 * @param ArrayHash $values
	 * @return void
	 */
	public function onSuccess(Form $form, ArrayHash $values): void
	{
		$translator = $this->translator->createPrefixedTranslator("admin.workspace");
		$values = $this->transformValues($values);

		if (empty($values['id']))
		{
			$result = $this->workspaceFacade->create($values);
		}
		else
		{
			$result = $this->workspaceFacade->edit($values);
		}

		if ($result->isSuccess())
		{
			$this->presenter->flashMessage($translator->translate("form.save_success"), "success");
		}
		else
		{
			switch ($result->getError())
			{
				case $result::ENTITY_NOT_FOUND:
				{
					$this->presenter->flashMessage($translator->translate("form.save_error_null"), "danger");
				}
			}
		}

		$this->onSave($this, $values);
	}

	public function handleCancel()
	{
		$this->onCancel();
	}

	private function transformValues(ArrayHash $values): array
	{
		$transformed = [];

		if (empty($values['id']))
		{
			$transformed['id'] = null;
		}
		else
		{
			$transformed['id'] = intval($values['id']);
		}

		if (empty($values['name']))
		{
			$transformed['name'] = null;
		}
		else
		{
			$transformed['name'] = $values['name'];
		}

		if (empty($values['shortcut']))
		{
			$transformed['shortcut'] = null;
		}
		else
		{
			$transformed['shortcut'] = $values['shortcut'];
		}

		return $transformed;
	}
}
