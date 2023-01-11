<?php

namespace App\UI\Components\Project;

use App\Model\Database\Entity\Project;
use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Nette\Localization\Translator;

class ProjectGrid extends BaseComponent
{
	private EntityManager $em;

	private Translator $translator;

	public function __construct(
		EntityManager $em,
		Translator $translator,
	)
	{
		$this->em = $em;
		$this->translator = $translator;
	}

	public function createComponentGrid()
	{
		$grid = new BaseGrid();
		$grid->setDataSource($this->em->getProjectRepository()->createQueryBuilder("pr"));

		$grid->addColumnText("name", "Název")
			->setSortable()
			->setRenderer(function(Project $project) {
				bdump($project);
				return $project->getName();
			})
		;

		$grid->addColumnText("project_manager", "Project Manager")
			->setRenderer(function(Project $project) {
				return $project->getProjectManager()->getFullname();
			});

		$grid->addFilterText("name", "Název");

		//$grid->addColumnText("project_manager_user_id", "Project Manager");

		return $grid;
	}

}
