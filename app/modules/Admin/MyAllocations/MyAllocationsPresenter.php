<?php

namespace App\Modules\Admin\MyAllocations;

use App\Modules\Admin\BaseAdminPresenter;
use App\UI\Components\ProjectManagerProjects\ProjectManagerProjectsGrid;
use App\UI\Components\ProjectManagerProjects\ProjectManagerProjectsGridFactory;
use App\UI\Components\UserAllocation\UserAllocationGrid;
use App\UI\Components\UserAllocation\UserAllocationGridFactory;

class MyAllocationsPresenter extends BaseAdminPresenter
{
	/** @var UserAllocationGridFactory @inject */
	public UserAllocationGridFactory $userAllocationGridFactory;

	/** @var ProjectManagerProjectsGridFactory @inject */
	public ProjectManagerProjectsGridFactory $projectManagerProjectsGridFactory;

	public function createComponentUserAllocationGrid(): UserAllocationGrid {
		return $this->userAllocationGridFactory->create();
	}

	public function createComponentProjectManagerProjectsGrid(): ProjectManagerProjectsGrid
	{
		return $this->projectManagerProjectsGridFactory->create();
	}
}
