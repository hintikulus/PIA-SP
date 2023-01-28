<?php

namespace App\UI\Components\Allocation;

use App\Domain\ProjectAllocation\AllocationFacade;
use App\Domain\ProjectAllocation\AllocationFacadeResult;
use App\Model\Database\Entity\ProjectAllocation;
use App\Model\Database\Entity\User;
use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Contributte\Translation\Translator;

class AllocationUserChooseGrid extends BaseComponent
{
	private AllocationFacade $allocationFacade;
	private int $projectId;

	public function __construct(
		AllocationFacade     $allocationFacade,
		\Nette\Security\User $user,
		Translator           $translator,
		int                  $projectId
	)
	{
		$this->allocationFacade = $allocationFacade;
		$this->user = $user;
		$this->translator = $translator;
		$this->projectId = $projectId;
	}

	public function createComponentGrid(): BaseGrid
	{
		$grid = new BaseGrid();
		$grid->setRefreshUrl(false);
		$grid->setRememberState(false);

		$grid->setDataSource($this->allocationFacade->getQueryBuilderForUserChooseAllocationGrid($this->projectId));

		$grid->addColumnNumber('id', "#");

		$grid->addColumnText('lastname', 'Pracovník')
			->setRenderer(function(array $user) {
				return $user[0]->getFullname();
			})->setSortable()->setSort('ASC')
		;

		$grid->addFilterText('lastname', 'Pracovník');

		$grid->addColumnNumber('allocation_sum', 'Alokace (H/W)')
			->setRenderer(function(array $user) {
				if ($user['allocation_sum'] === null)
				{
					return 0;
				}
				return $user['allocation_sum'];
			})
		;

		$grid->addColumnNumber('allocation_sum_xfte', 'Alokace (FTE)')
			->setRenderer(function(array $user) {
				if ($user['allocation_sum'] === null)
				{
					return 0;
				}
				return AllocationFacade::convertHoursToFTE($user['allocation_sum']);
			})
		;

		$grid->addActionCallback('select', "", function($userId) {
			$this->presenter->redirect('this', ['projectId' => $this->projectId, 'userId' => $userId]);
		})
			->setIcon('plus')
			->setClass('btn btn-sm btn-outline-success px-3 mb-0')
		;

		return $grid;
	}
}
