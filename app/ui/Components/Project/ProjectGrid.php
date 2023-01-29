<?php

namespace App\UI\Components\Project;

use App\Model\Database\Entity\Project;
use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Nette\Localization\Translator;
use Ublaboo\DataGrid\Column\Action\Confirmation\StringConfirmation;

class ProjectGrid extends BaseComponent
{

	public function createComponentGrid(): BaseGrid
	{
		$translator = $this->translator->createPrefixedTranslator('admin.project');
		$grid = new BaseGrid();
		$grid->setTranslator($this->translator);
		$grid->setDataSource($this->em->getProjectRepository()->createQueryBuilder("pr"));

		$grid->addColumnText("name", $translator->translate('attributes.name'))
			->setSortable()
			->setRenderer(function(Project $project) {
				return $project->getName();
			})
		;

		$grid->addColumnText("project_manager", $translator->translate("attributes.project_manager"))
			->setRenderer(function(Project $project) {
				return $project->getProjectManager()->getFullname();
			})
		;

			$grid->addAction('view', ' ' . $this->translator->translate("admin.base.show"), ':view')
				->setIcon('eye')
				->setClass('btn btn-outline-secondary btn-sm mb-0')
				->setRenderCondition(function(Project $project) {
					$permission = $this->user->isAllowed('Admin:Project:view');
					if ($project->getProjectManager()->getId() == $this->user->getId())
					{
						return true;
					}

					return $permission;
				})
			;

		if ($this->user->isAllowed('Admin:Project:listEdit'))
		{
			$grid->addActionCallback('edit', ' ' . $this->translator->translate("admin.base.edit"), function($projectId) {
				$this->presenter->redirect(':listEdit', ['id' => $projectId]);
			})
				->setIcon('edit')
				->setClass('btn btn-outline-secondary btn-sm mb-0')
			;
		}

		/*
		$grid->addAction('delete', '', ':delete')
			->setIcon('trash')
			->setClass('btn btn-outline-danger btn-sm px-2')
			->setConfirmation(new StringConfirmation("Opravdu chcete odstranit záznam?"))
		;
		*/
		//$grid->addColumnText("project_manager_user_id", "Project Manager");

		return $grid;
	}

}
