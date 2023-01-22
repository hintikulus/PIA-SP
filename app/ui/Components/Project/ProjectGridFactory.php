<?php

namespace App\UI\Components\Project;

use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseFactoryTrait;
use Nette\Localization\Translator;

interface ProjectGridFactory
{
	public function create(): ProjectGrid;
}
