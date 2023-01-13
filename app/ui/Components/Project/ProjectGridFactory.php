<?php

namespace App\UI\Components\Project;

use App\Model\Database\EntityManager;
use App\UI\Components\Base\BaseFactoryTrait;
use Nette\Localization\Translator;

class ProjectGridFactory
{
	use BaseFactoryTrait;

	public function create(): ProjectGrid
	{
		return new ProjectGrid($this->em, $this->user, $this->translator);
	}
}
