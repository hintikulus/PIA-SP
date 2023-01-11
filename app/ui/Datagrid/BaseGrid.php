<?php

namespace App\UI\Datagrid;

use Ublaboo\DataGrid\DataGrid;

class BaseGrid extends DataGrid
{
	public function __construct() {
		parent::__construct();
		$this->setTemplateFile(__DIR__ . '/template.latte');
	}
}
