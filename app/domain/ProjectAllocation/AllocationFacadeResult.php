<?php

namespace App\Domain\ProjectAllocation;

use App\Domain\Base\BaseFacadeResult;

class AllocationFacadeResult extends BaseFacadeResult
{
	public const ERROR_USER_ALREADY_EXISTS = 2;
	public const ERROR_USER_ALLOCATION_EXEEDED = 3;
}
