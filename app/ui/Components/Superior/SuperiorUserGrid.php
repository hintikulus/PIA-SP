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
		SuperiorFacade   $superiorFacade,
		Translator $translator,
		User             $user,
	)
	{
		$this->superiorFacade = $superiorFacade;
		$this->translator = $translator;
		$this->user = $user;
	}

	public function createComponentGrid(): BaseGrid
	{
		$grid = new BaseGrid();

		$grid->setDataSource($this->superiorFacade->getQueryBuilderForSuperiorGrid($this->user->getId()));

		$grid->addColumnText("fullname", "Zaměstnanec")
			->setRenderer(function(array $user) {
				return $user[0]->getUser()->getFullname();
			})
		;

		$grid->addAction('user', ' Zobrazit', ':user');

		return $grid;
	}
}
