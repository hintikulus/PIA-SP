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
		$translator = $this->translator->createPrefixedTranslator('admin.user');
		$grid = new BaseGrid();
		$grid->setTranslator($this->translator);
		$grid->setDataSource($this->em->getUserRepository()->createQueryBuilder("ur"));

		$grid->addColumnText("login", $translator->translate('attributes.login'))
			->setSortable()
		;

		$grid->addFilterText("login", $translator->translate('attributes.login'));

		$grid->addColumnText("firstname", $translator->translate('attributes.firstname'))
			->setSortable()
			->setAlign('end')
		;

		$grid->addFilterText("firstname", $translator->translate('attributes.firstname'));

		$grid->addColumnText("lastname", $translator->translate('attributes.lastname'))
			->setSortable()
		;

		$grid->addFilterText("lastname", $translator->translate('attributes.lastname'));

		$grid->addColumnText("email", $translator->translate('attributes.email'))
			->setSortable()
		;

		$grid->addFilterText("email", $translator->translate('attributes.email'));

		$grid->addColumnText("role", $translator->translate('attributes.role'))->setRenderer(function(User $row) {
			return $this->translator->translate("admin.role." . $row->getRole());
		});

		return $grid;
	}

}
