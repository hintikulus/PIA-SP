<?php

namespace App\UI\Components\ProjectManagerProjects;

use App\Domain\Project\ProjectFacade;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Contributte\Translation\Translator;
use Nette\Security\User;

class ProjectManagerProjectsGrid extends BaseComponent
{
	private ProjectFacade $projectFacade;

	public function __construct(
		ProjectFacade $projectFacade,
		User $user,
		Translator $translator,
	)
	{
		$this->projectFacade = $projectFacade;
		$this->user = $user;
		$this->translator = $translator;
	}

	public function createComponentGrid(): BaseGrid
	{
		$grid = new BaseGrid();

		$grid->setDataSource($this->projectFacade->getQueryBuilderProjectsByManager($this->user->id));

		$grid->addColumnText('name', "Projekt");

		$grid->addAction('view', '', 'Project:view')
			->setIcon('eye')
			->setClass('btn btn-outline-secondary btn-sm mb-0 px-3')
		;

		return $grid;
	}

}
