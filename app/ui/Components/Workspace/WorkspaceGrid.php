<?php

namespace App\UI\Components\Workspace;

use App\Model\Database\Entity\Workspace;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Ublaboo\DataGrid\Column\Action\Confirmation\CallbackConfirmation;
use Ublaboo\DataGrid\Column\Action\Confirmation\StringConfirmation;
use Ublaboo\DataGrid\DataGrid;

class WorkspaceGrid extends BaseComponent
{
	public function createComponentGrid(): BaseGrid
	{
		$translator = $this->translator->createPrefixedTranslator("admin.workspace");
		$grid = new BaseGrid();

		$grid->setDataSource($this->em->getWorkspaceRepository()->createQueryBuilder("wr"));

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

	public function handleDelete(int $id): void
	{
		$workspace = $this->em->getWorkspaceRepository()->find($id);

		if($workspace === null) {
			return;
		}

		$this->em->remove($workspace);
		$this->em->flush();

		if($this->presenter->isAjax()) {
			/** @var BaseGrid $grid */
			$grid = $this["grid"];

			$grid->reload();
		}
	}
}
