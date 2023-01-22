<?php

namespace App\Model\Database\Entity\Attributes;

trait TDeleted
{
	/**
	 * @var int
	 * @ORM\Column(type="integer", nullable=FALSE)
	 * @ORM\GeneratedValue
	 */
	private int $deleted = 0;

	public function isDeleted(): bool
	{
		return $this->deleted === 1;
	}

	public function setDeleted(bool $deleted = true) {
		$this->deleted = $deleted;
	}
}
