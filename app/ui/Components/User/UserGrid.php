<?php

namespace App\UI\Components\User;

use App\Model\Database\Entity\User;
use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseComponent;
use App\UI\Datagrid\BaseGrid;
use Nette\Localization\Translator;
use Ublaboo\DataGrid\DataGrid;

class UserGrid extends BaseComponent
{
	public function createComponentGrid(): BaseGrid
	{
		$grid = new BaseGrid();
		$grid->setDataSource($this->em->getUserRepository()->createQueryBuilder("ur"));

		$grid->addColumnText("login", "Login")
			->setSortable()
		;

		$grid->addFilterText("login", "Login");

		$grid->addColumnText("firstname", "Křestní jméno")
			->setSortable()
			->setAlign('end')
		;

		$grid->addFilterText("firstname", "Křestní jméno");

		$grid->addColumnText("lastname", "Příjmení")
			->setSortable()
		;

		$grid->addFilterText("lastname", "Příjmení");

		$grid->addColumnText("email", "Email")
			->setSortable()
		;

		$grid->addFilterText("email", "Email");

		$grid->addColumnText("role", "Role")->setRenderer(function(User $row) {
			return $this->translator->translate("admin.role." . $row->getRole());
		});

		return $grid;
	}

}
