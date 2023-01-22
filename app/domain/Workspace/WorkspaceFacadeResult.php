<?php

namespace App\Domain\Workspace;

use App\Domain\Base\BaseFacadeResult;

class WorkspaceFacadeResult extends BaseFacadeResult
{
	public function getError(): int
	{
		return $this->error;
	}

	public function isSuccess(): bool
	{
		return $this->success;
	}
}
