<?php

namespace App\UI\Components\Superior;

use App\Domain\ProjectAllocation\AllocationFacade;
use App\Domain\Superior\SuperiorFacade;
use App\Domain\User\UserFacade;
use App\Model\Database\Entity\ProjectAllocation;
use App\Model\Database\Entity\UserSuperiorUser;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Nette\Security\User;

class SuperiorUserGrid extends BaseComponent
{
	private SuperiorFacade $superiorFacade;
	private AllocationFacade $allocationFacade;

	public function __construct(
		SuperiorFacade   $superiorFacade,
		AllocationFacade $allocationFacade,
		User             $user
	)
	{
		$this->superiorFacade = $superiorFacade;
		$this->allocationFacade = $allocationFacade;
		$this->user = $user;
	}

	public function createComponentGrid(): BaseGrid
	{
		$grid = new BaseGrid();

		$grid->setDataSource($this->superiorFacade->getQueryBuilderForSuperiorGrid($this->user->getId()));

		$grid->setTreeView([$this, 'getChildren'], 'allocation_sum');

		$grid->addColumnText("fullname", "Zaměstnanec")
			->setRenderer(function(array $user) {
				return $user[0]->getUser()->getFullname();
			})
		;

		return $grid;
	}

	public function getChildren($parentId) {
		return $this->allocationFacade
			->getQueryBuilderForMyAllocationGrid($parentId);
	}

	public function hasChildren($parentId) {
		//return $this->database->table('items')->where('parentId',$parentId)->count() > 0 ? true : false;
	}
}
