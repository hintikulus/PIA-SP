<?php

namespace App\Model\Database\Entity;

use App\Model\Database\Entity\Attributes\TDeleted;
use App\Model\Database\Entity\Attributes\TId;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\WorkspaceRepository")
 * @ORM\Table(name="`workspace`")
 * @ORM\HasLifecycleCallbacks
 */
class Workspace extends AbstractEntity
{
	use TId;
	use TDeleted;

	/**
	 * @var string
	 * @ORM\Column
	 */
	private $name;

	/**
	 * @var string
	 * @ORM\Column
	 */
	private $shortcut;

	public function __construct(string $name, string $shortcut)
	{
		$this->name = $name;
		$this->shortcut = $shortcut;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setShortcut(string $shortcut): void
	{
		$this->shortcut = $shortcut;
	}

	public function getShortcut(): string
	{
		return $this->shortcut;
	}
}
