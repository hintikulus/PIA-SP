<?php

namespace App\UI\Components\Allocation;

interface AllocationUserChooseGridFactory
{
	public function create(int $projectId): AllocationUserChooseGrid;
}
