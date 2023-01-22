<?php

namespace App\UI\Components\Project;

interface ProjectUserAllocationGridFactory
{
	public function create(int $projectId): ProjectUserAllocationGrid;
}
