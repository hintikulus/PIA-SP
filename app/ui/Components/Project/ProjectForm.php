<?php

namespace App\UI\Components\Project;

use App\Domain\Project\ProjectFacade;
use App\Domain\Project\ProjectFacadeResult;
use App\Model\Database\Entity\Project;
use App\Model\Database\Entity\Workspace;
use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseComponent;
use App\UI\Form\BaseForm;
use Contributte\Translation\Translator;
use Nette\Application\Attributes\Persistent;
use Nette\Forms\Form;
use Nette\Security\User;
use Nette\Utils\ArrayHash;

class ProjectForm extends BaseComponent
{
	/** @var callable[] */
	public array $onSave;
	/** @var callable[] */
	public array $onCancel;

	private ?int $id = null;

	private ProjectFacade $projectFacade;

	public function __construct(
		ProjectFacade $projectFacade,
		User          $user,
		Translator    $translator,
		?int          $id,
	)
	{
		$this->projectFacade = $projectFacade;
		$this->id = $id;
		$this->user = $user;
		$this->translator = $translator;
	}

	/**
	 * Úprava vykreslení formuláře
	 * Vyplnění výchozích hodnot formulářových prvků
	 * @param mixed|null $params
	 * @return void
	 */
	public function render(mixed $params = null): void
	{
		if ($this->id)
		{
			$project = $this->projectFacade->get($this->id);
			if ($project !== null)
			{

				$defaults = [
					'name'        => $project->getName(),
					'description' => $project->getDescription(),
					'manager'     => $project->getProjectManager()->getId(),
				];

				$this['form']->setDefaults($defaults);

				$this->template->project = $project;
			}
		}

		parent::render($params);
	}

	/**
	 * Vytvoření komponenty formuláře
	 * @return BaseForm
	 * @throws \Contributte\Translation\Exceptions\InvalidArgument
	 */
	public function createComponentForm(): BaseForm
	{
		$translator = $this->translator->createPrefixedTranslator("admin.project");
		$form = new BaseForm();
		$form->addHidden('id', $this->id);

		$form->addText('name', $translator->translate("attributes.name"))
			->setRequired()
			->setHtmlAttribute("placeholder", $translator->translate("form.placeholders.name"))
		;

		$form->addTextArea('description', $translator->translate("attributes.description"));

		$form->addSelect('manager', $translator->translate("attributes.project_manager"), $this->projectFacade->getProjectManagersPairs())
			->setPrompt($translator->translate("form.placeholders.project_manager"))
		;

		$form->addSubmit('submit', $this->translator->translate('admin.base.savebutton'));
		$form->onValidate[] = [$this, 'onValidate'];
		$form->onSuccess[] = [$this, 'onSuccess'];
		return $form;
	}

	/**
	 * Proces validování formuláře
	 * @param Form $form
	 * @param ArrayHash $values
	 * @return void
	 */
	public function onValidate(Form $form, ArrayHash $values)
	{
	}

	/**
	 * Proces úspěšně odeslaného formuláře
	 * @param Form $form
	 * @param ArrayHash $values
	 * @return void
	 * @throws \Nette\Application\AbortException
	 */
	public function onSuccess(Form $form, ArrayHash $values)
	{
		$translator = $this->translator->createPrefixedTranslator("admin.project");
		$values = $this->transformValues($values);

		if ($values['id'] === null)
		{
			$result = $this->projectFacade->create($values);
		}
		else
		{
			$result = $this->projectFacade->edit($values);
		}

		if ($result->isSuccess())
		{
			$this->presenter->flashMessage("Uložení proběhlo úspěšně", "success");
			$this->onSave($this, $values);
		}
		else
		{
			$this->presenter->flashMessage("Při ukládání došlo k chybě. Nebylo nic uloženo.", "danger");
		}
	}

	/**
	 * Zpracování hodnot z formuláře pro pozdější použití
	 * @param ArrayHash $values
	 * @return mixed[]
	 */
	private function transformValues(ArrayHash $values): array
	{
		$transformed = [];

		if (empty($values['id']))
		{
			$transformed['id'] = null;
		}
		else
		{
			$transformed['id'] = $values['id'];
		}

		$transformed['name'] = $values['name'];

		if (empty($values['description']))
		{
			$transformed['description'] = null;
		}
		else
		{
			$transformed['description'] = $values['description'];
		}

		$transformed['manager'] = $values['manager'];

		return $transformed;
	}

	public function handleCancel(): void
	{
		$this->onCancel($this);
	}
}
