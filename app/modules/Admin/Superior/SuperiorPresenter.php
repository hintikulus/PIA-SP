<?php

namespace App\Modules\Admin\Superior;

use App\Domain\User\UserFacade;
use App\Modules\Admin\BaseAdminPresenter;
use App\UI\Components\Superior\SuperiorUserGrid;
use App\UI\Components\Superior\SuperiorUserGridFactory;
use App\UI\Components\UserAllocation\UserAllocationGrid;
use App\UI\Components\UserAllocation\UserAllocationGridFactory;

class SuperiorPresenter extends BaseAdminPresenter
{
	private SuperiorUserGridFactory $superiorUserGridFactory;
	private UserAllocationGridFactory $userAllocationGridFactory;
	private UserFacade $userFacade;

	public function __construct(
		SuperiorUserGridFactory $superiorUserGridFactory,
		UserAllocationGridFactory $userAllocationGridFactory,
		UserFacade $userFacade,
	)
	{
		$this->superiorUserGridFactory = $superiorUserGridFactory;
		$this->userAllocationGridFactory = $userAllocationGridFactory;
		$this->userFacade = $userFacade;
	}

	public function actionUser(int $id): void
	{
		$user = $this->userFacade->get($id);
		if($user === null)
		{
			$this->error("Uživatel neexistuje");
		}
	}

	public function createComponentUserAllocationGrid(): UserAllocationGrid
	{
		return $this->userAllocationGridFactory->create((int) $this->getParameter('id'));
	}

	public function createComponentSuperiorUserGrid(): SuperiorUserGrid
	{
		return $this->superiorUserGridFactory->create();
	}
}
