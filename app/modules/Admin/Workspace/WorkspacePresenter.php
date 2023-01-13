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
		if(!empty($this->getParameter('id'))) {
			$this->redirect(':list');
		}
	}

	public function actionEdit(): void {
		if(empty($this->getParameter('id'))) {
			$this->redirect(':list');
		}
	}

	public function createComponentWorkspaceListGrid(): WorkspaceGrid
	{
		return $this->workspaceGridFactory->create();
	}

	public function createComponentWorkspaceForm(): WorkspaceForm
	{
		return $this->workspaceFormFactory->create($this->getParameter('id'));
	}
}
