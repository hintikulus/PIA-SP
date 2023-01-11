<?php

namespace App\Modules\Admin\Project;

use App\Modules\Admin\BaseAdminPresenter;
use App\UI\Components\Project\ProjectGridFactory;
use Nette;

class ProjectPresenter extends BaseAdminPresenter
{
	/** @var ProjectGridFactory @inject */
	public ProjectGridFactory $projectGridFactory;

	public function createComponentProjectListGrid()
	{
		return $this->projectGridFactory->create();
	}
}
