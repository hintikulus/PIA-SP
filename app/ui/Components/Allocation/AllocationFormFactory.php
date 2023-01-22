<?php

namespace App\UI\Components\Allocation;

interface AllocationFormFactory
{
	public function create(array $data): AllocationForm;
}
