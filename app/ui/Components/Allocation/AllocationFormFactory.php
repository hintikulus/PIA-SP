<?php

namespace App\UI\Components\Allocation;

interface AllocationFormFactory
{
	/**
	 * @param mixed[] $data
	 * @return AllocationForm
	 */
	public function create(array $data): AllocationForm;
}
