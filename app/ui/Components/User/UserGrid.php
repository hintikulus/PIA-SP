<?php

namespace App\UI\Components\User;

use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Ublaboo\DataGrid\DataGrid;

class UserGrid extends BaseComponent
{
	private EntityManager $em;

	public function __construct(EntityManager $em) {
		$this->em = $em;
	}

	public function createComponentGrid()
	{
		$grid = new BaseGrid();
		$grid->setDataSource($this->em->getUserRepository()->createQueryBuilder("ur"));

		$grid->addColumnText("login", "Login");
		$grid->addColumnText("firstname", "Křestní jméno")
			->setAlign('end')
		;

		$grid->addFilterText("firstname", "Křestní jméno")
		;

		$grid->addColumnText("lastname", "Příjmení")
		->setSortable();
		return $grid;
	}

}
