<?php

namespace App\UI\Components\Workspace;

use App\Domain\Workspace\WorkspaceFacade;
use App\Model\Database\Entity\Workspace;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Contributte\Translation\Translator;
use Nette\Application\LinkGenerator;
use Nette\Security\User;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Ublaboo\DataGrid\Column\Action\Confirmation\CallbackConfirmation;
use Ublaboo\DataGrid\Column\Action\Confirmation\StringConfirmation;
use Ublaboo\DataGrid\DataGrid;

class WorkspaceGrid extends BaseComponent
{
	private WorkspaceFacade $workspaceFacade;

	public function __construct(
		WorkspaceFacade $workspaceFacade,
		User            $user,
		Translator      $translator,
		LinkGenerator   $linkGenerator,
	)
	{
		$this->workspaceFacade = $workspaceFacade;
		$this->user = $user;
		$this->translator = $translator;
		$this->linkGenerator = $linkGenerator;
	}

	/**
	 * Vytvoření komponenty gridu
	 * @return BaseGrid
	 * @throws \Contributte\Translation\Exceptions\InvalidArgument
	 * @throws \Ublaboo\DataGrid\Exception\DataGridException
	 */
	public function createComponentGrid(): BaseGrid
	{
		$translator = $this->translator->createPrefixedTranslator("admin.workspace");
		$grid = new BaseGrid();

		$grid->setDataSource($this->workspaceFacade->getQueryBuilderForGrid());

		$grid->addColumnText('shortcut', $translator->translate("attributes.shortcut"));
		$grid->addColumnText('name', $translator->translate("attributes.name"));

		$grid->addAction("edit", $this->translator->translate("admin.base.edit"), ":edit")
			->setIcon("edit")
			->setClass("btn btn-sm btn-outline-secondary mb-0 px-2")
		;

		$grid->addAction("delete", "", "delete!")
			->setConfirmation(new StringConfirmation($this->translator->translate("admin.base.deleteConfirm")))
			->setIcon("trash")
			->setClass("ajax btn btn-sm btn-outline-danger mb-0 px-2")
		;

		return $grid;
	}

	/**
	 * Odstranění pracovní skupiny
	 * @param int $id
	 * @return void
	 */
	public function handleDelete(int $id): void
	{
		$translator = $this->translator->createPrefixedTranslator("admin.workspace");
		$result = $this->workspaceFacade->delete($id);

		if($result->isSuccess()) {
			$this->presenter->flashMessage($translator->translate("form.delete_success"), "success");

			if ($this->presenter->isAjax())
			{
				/** @var BaseGrid $grid */
				$grid = $this["grid"];

				$grid->reload();
			}
		} else {
			switch ($result->getError())
			{
				case $result::ENTITY_NOT_FOUND:
					$this->presenter->flashMessage($translator->translate("form.delete_error_null"), "danger");
			}
		}
	}
}
