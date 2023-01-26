<?php

namespace App\Model\Database\Entity;

use App\Model\Database\Entity\Attributes\TDeleted;
use App\Model\Database\Entity\Attributes\TId;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\ProjectRepository")
 * @ORM\Table(name="`project`")
 * @ORM\HasLifecycleCallbacks
 */
class Project extends AbstractEntity
{
	use TId;
	use TDeleted;

	/**
	 * @var string
	 * @ORM\Column
	 */
	private $name;

	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="managedProjects")
	 * @ORM\JoinColumn(name="project_manager_user_id", referencedColumnName="id")
	 */
	private User $projectManager;

	/**
	 * @var Collection<int, ProjectAllocation>
	 * @ORM\OneToMany(targetEntity="ProjectAllocation", mappedBy="project")
	 */
	private Collection $projectAllocations;

	/**
	 * @var string
	 * @ORM\Column
	 */
	private ?string $description;

	public function __construct(
		string  $name,
		User    $projectManager,
		?string $description
	)
	{
		$this->name = $name;
		$this->projectManager = $projectManager;
		$this->description = $description;
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

	public function getProjectManager(): User
	{
		return $this->projectManager;
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(?string $description): void
	{
		$this->description = $description;
	}
}
