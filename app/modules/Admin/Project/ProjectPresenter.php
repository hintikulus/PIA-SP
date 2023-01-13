<?php

namespace App\Modules\Admin\Project;

use App\Modules\Admin\BaseAdminPresenter;
use App\UI\Components\Project\ProjectGrid;
use App\UI\Components\Project\ProjectGridFactory;
use Nette;

class ProjectPresenter extends BaseAdminPresenter
{
	/** @var ProjectGridFactory @inject */
	public ProjectGridFactory $projectGridFactory;

	public function createComponentProjectListGrid(): ProjectGrid
	{
		return $this->projectGridFactory->create();
	}
}
