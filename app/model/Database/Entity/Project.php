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

	public function __construct(string $name, int $projectManagerUserId)
	{
		$this->name = $name;
		//$this->projectManagerUserId = $projectManagerUserId;
	}

	public function setProjectManagerUserId(int $projectManagerUserId)
	{
		//$this->projectManagerUserId = $projectManagerUserId;
	}

	public function setName(string $name)
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

}
