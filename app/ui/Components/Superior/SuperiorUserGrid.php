<?php

namespace App\UI\Components\Superior;

use App\Domain\Superior\SuperiorFacade;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Contributte\Translation\Translator;
use Nette\Security\User;

class SuperiorUserGrid extends BaseComponent
{
	private SuperiorFacade $superiorFacade;

	public function __construct(
		SuperiorFacade $superiorFacade,
		Translator     $translator,
		User           $user,
	)
	{
		$this->superiorFacade = $superiorFacade;
		$this->translator = $translator;
		$this->user = $user;
	}

	public function createComponentGrid(): BaseGrid
	{
		$grid = new BaseGrid();
		$grid->setTranslator($this->translator);

		$grid->setDataSource($this->superiorFacade->getQueryBuilderForSuperiorGrid($this->user->getId()));

		$grid->addColumnText("fullname", $this->translator->translate('admin.superior.employee'))
			->setRenderer(function(array $user) {
				return $user[0]->getUser()->getFullname();
			})
		;

		$grid->addAction('user', ' ' . $this->translator->translate('admin.superior.grid_action.show'), ':user')
			->setIcon('eye')
			->setClass('btn btn-outline-secondary btn-sm mb-0')
		;

		return $grid;
	}
}
