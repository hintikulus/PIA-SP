<?php

namespace App\Modules\Admin\Workspace;

use App\Modules\Admin\BaseAdminPresenter;
use App\UI\Components\Workspace\WorkspaceForm;
use App\UI\Components\Workspace\WorkspaceFormFactory;
use App\UI\Components\Workspace\WorkspaceGrid;
use App\UI\Components\Workspace\WorkspaceGridFactory;

class WorkspacePresenter extends BaseAdminPresenter
{
	/** @var WorkspaceGridFactory @inject */
	public WorkspaceGridFactory $workspaceGridFactory;

	/** @var WorkspaceFormFactory @inject */
	public WorkspaceFormFactory $workspaceFormFactory;

	public function actionAdd(): void {

	}

	public function actionEdit(): void {

	}

	public function createComponentWorkspaceListGrid(): WorkspaceGrid
	{
		return $this->workspaceGridFactory->create();
	}

	public function createComponentWorkspaceForm(): WorkspaceForm
	{
		/** @var WorkspaceForm $control */
		$control = $this->workspaceFormFactory->create($this->getParameter('id'));
		$control->onSave[] = function()
		{
			$this->redirect(":list");
		};

		$control->onCancel[] = function()
		{
			$this->redirect(":list");
		};

		return $control;
	}
}
