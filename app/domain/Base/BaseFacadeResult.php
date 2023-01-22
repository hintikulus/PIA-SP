<?php

namespace App\Domain\Base;

class BaseFacadeResult
{
	public const OK = 0;
	public const ENTITY_NOT_FOUND = 1;

	protected bool $success;
	protected int $error;

	public function __construct(bool $success = true, int $error = self::OK)
	{
		$this->success = $success;
		$this->error = $error;
	}

	public function getError(): int
	{
		return $this->error;
	}

	public function isSuccess(): bool
	{
		return $this->success;
	}
}

