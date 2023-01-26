<?php

namespace App\Modules\Admin\Project;

use App\Model\App;
use App\Model\Database\EntityManager;
use App\Modules\Admin\BaseAdminPresenter;
use App\UI\Components\Allocation\AllocationForm;
use App\UI\Components\Allocation\AllocationFormFactory;
use App\UI\Components\Allocation\AllocationUserChooseGrid;
use App\UI\Components\Allocation\AllocationUserChooseGridFactory;
use App\UI\Components\Project\ProjectForm;
use App\UI\Components\Project\ProjectFormFactory;
use App\UI\Components\Project\ProjectGrid;
use App\UI\Components\Project\ProjectGridFactory;
use App\UI\Components\Project\ProjectUserAllocationGrid;
use App\UI\Components\Project\ProjectUserAllocationGridFactory;
use Composer\Package\Link;
use Nette;

class ProjectPresenter extends BaseAdminPresenter
{
	public const ACTION_VIEW = 'view';
	public const ACTION_LIST = 'list';
	public const ACTION_ADD = 'add';
	public const ACTION_EDIT = 'edit';

	/** @var ProjectGridFactory @inject */
	public ProjectGridFactory $projectGridFactory;

	/** @var ProjectUserAllocationGridFactory @inject */
	public ProjectUserAllocationGridFactory $projectUserAllocationGridFactory;

	/** @var ProjectFormFactory @inject */
	public ProjectFormFactory $projectFormFactory;

	/** @var AllocationUserChooseGridFactory @inject */
	public AllocationUserChooseGridFactory $allocationUserChooseGridFactory;

	/** @var AllocationFormFactory @inject */
	public AllocationFormFactory $allocationFormFactory;

	/** @var EntityManager @inject */
	public EntityManager $em;

	public function actionView(int $id): void
	{
		$project = $this->em->getProjectRepository()->find($id);
		if ($project === null || $project->isDeleted())
		{
			$this->error("Projekt nenalezen", 404);
		}
		$this->template->project = $project;
	}

	public function actionEdit(int $id): void
	{
		$project = $this->em->getProjectRepository()->find($id);
		if ($project === null || $project->isDeleted())
		{
			$this->error("Projekt nenalezen", 404);
		}
		$this->template->project = $project;
	}

	public function actionAllocationAdd(int $projectId, ?int $userId): void
	{
		$project = $this->em->getProjectRepository()->find($projectId);
		if ($project === null || $project->isDeleted())
		{
			$this->error("Project nenalezen", 404);
		}
		$this->template->project = $project;

		if (!empty($userId))
		{
			$this->template->selectedUser = $this->em->getUserRepository()->find($userId);
		}
	}

	public function actionAllocationEdit(int $id): void
	{
		$allocation = $this->em->getProjectAllocationRepository()->find($id);

		if ($allocation === null || $allocation->isDeleted())
		{
			$this->error("Alokace nenalezena", 404);
		}

	}

	public function createComponentProjectListGrid(): ProjectGrid
	{
		return $this->projectGridFactory->create();
	}

	public function createComponentProjectUserAllocationGrid(): ProjectUserAllocationGrid
	{
		return $this->projectUserAllocationGridFactory->create($this->getParameter('id'));
	}

	public function createComponentProjectForm(): ProjectForm
	{
		$control = $this->projectFormFactory->create($this->getParameter('id'));

		$control->onSave[] = function(ProjectForm $control, $data) {
			$this->redirect(":view", $this->getParameter('id'));
		};

		$control->onCancel[] = function(ProjectForm $control) {

			$this->redirect(":view", $this->getParameter('id'));
		};

		return $control;
	}

	public function createComponentListProjectForm(): ProjectForm
	{
		$control = $this->projectFormFactory->create($this->getParameter('id'));

		$control->onSave[] = function(ProjectForm $control, $data) {
			$this->redirect(":list");
		};

		$control->onCancel[] = function() {
			$this->redirect(":list");
		};

		return $control;
	}

	public function createComponentAllocationUserChooseGrid(int|string $projectId, int|string|null $userId = null): AllocationUserChooseGrid
	{
		return $this->allocationUserChooseGridFactory->create($this->getParameter('projectId'));
	}

	public function createComponentAllocationAddForm(): AllocationForm
	{
		//return $this->allocationFormFactory->createToAdd($this->getParameter('projectId'), $this->getParameter('userId'));
		/** @var AllocationForm $control */
		$control = $this->allocationFormFactory->create([
			'projectId' => $this->getParameter('projectId'),
			'userId'    => $this->getParameter('userId'),
		]);

		$control->onSave[] = function(AllocationForm $form, array $data) {
			$this->redirect(':view', $data['project_id']);
		};

		$control->onCancel[] = function(AllocationForm $form)
		{
			$this->redirect(':view', $form->getProjectId());
		};

		return $control;
	}

	public function createComponentAllocationEditForm(): AllocationForm
	{
		/** @var AllocationForm $control */
		$control = $this->allocationFormFactory->create([
			'allocationId' => $this->getParameter('id'),
		]);

		$control->onSave[] = function(AllocationForm $form, array $data) {
			$this->redirect(':view', $data['project_id']);
		};

		$control->onCancel[] = function(AllocationForm $form)
		{
			$this->redirect(':view', $form->getProjectId());
		};

		return $control;
		//return $this->allocationFormFactory->createToEdit($this->getParameter('id'));
	}
}
