<?php

namespace App\UI\Components\Project;

use App\Model\Database\EntityManager;
use Nette\Localization\Translator;

class ProjectGridFactory
{

	private EntityManager $em;
	private Translator $translator;

	public function __construct(EntityManager $em, Translator $translator) {
		$this->em = $em;
		$this->translator = $translator;
	}


	public function create(): ProjectGrid
	{
		return new ProjectGrid($this->em, $this->translator);
	}
}
