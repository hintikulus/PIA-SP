<?php

namespace App\Model\Database\Entity;

use App\Model\Database\Entity\Attributes\TId;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\ProjectRepository")
 * @ORM\Table(name="`project`")
 * @ORM\HasLifecycleCallbacks
 */
class Project extends AbstractEntity
{
	use TId;

	/**
	 * @var string
	 * @ORM\Column
	 */
	private $name;


	/**
	 * @ORM\ManyToOne(targetEntity="User")
	 * @ORM\JoinColumn(name="project_manager_user_id", referencedColumnName="id")
	 */
	private User|null $projectManager;

	public function __construct(string $name, User $projectManager)
	{
		$this->name = $name;
		$this->projectManager = $projectManager;
	}

	public function setProjectManager(User $projectManager): void
	{
		$this->projectManager = $projectManager;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function getProjectManager(): ?User
	{
		return $this->projectManager;
	}

}
