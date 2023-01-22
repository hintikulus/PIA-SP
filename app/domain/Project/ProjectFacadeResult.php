<?php

namespace App\Domain\Project;

use App\Domain\Base\BaseFacadeResult;
use App\Model\Database\Entity\Project;

class ProjectFacadeResult extends BaseFacadeResult
{
	public const ENTITY_NOT_FOUND = 1;

	private ?Project $project = null;

	public function getProject(): ?Project
	{
		return $this->project;
	}

	public function setProject(Project $project): void
	{
		$this->project = $project;
	}
}
