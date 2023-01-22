<?php

namespace App\Model\Database\Entity;

use App\Model\App;
use App\Model\Database\Entity\Attributes\TDeleted;
use App\Model\Database\Entity\Attributes\TId;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\ProjectAllocationRepository")
 * @ORM\Table(name="`project_allocation`")
 * @ORM\HasLifecycleCallbacks
 */
class ProjectAllocation
{
	public const STATE_ACTIVE = "active";
	public const STATE_INACTIVE_DRAFT = "draft";
	public const STATE_INACTIVE_CANCELED = "canceled";

	public const STATES = [self::STATE_ACTIVE, self::STATE_INACTIVE_DRAFT, self::STATE_INACTIVE_CANCELED];

	public const STATES_IDS = [
		self::STATE_ACTIVE            => 0,
		self::STATE_INACTIVE_DRAFT    => 1,
		self::STATE_INACTIVE_CANCELED => 2
	];

	use TId;
	use TDeleted;

	/**
	 * @var User
	 * @ORM\ManyToOne(targetEntity="User")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 */
	private User $user;

	/**
	 * @var Project
	 * @ORM\ManyToOne(targetEntity="Project")
	 * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
	 */
	private Project $project;

	/**
	 * @var ?float
	 * @ORM\Column
	 */
	private ?float $allocation;

	/**
	 * @var ?DateTime
	 * @ORM\Column(type="datetime")
	 */
	private ?DateTime $timespan_from;

	/**
	 * @var ?DateTime
	 * @ORM\Column(type="datetime")
	 */
	private ?DateTime $timespan_to;

	/**
	 * @var ?string
	 * @ORM\Column
	 */
	private ?string $description;

	/**
	 * @var string
	 * @ORM\Column(name="state")
	 */
	private string $state;

	public function __construct(
		User    $user,
		Project $project,
	)
	{
		$this->user = $user;
		$this->project = $project;
		$this->allocation = 0;
		$this->state = self::STATE_ACTIVE;
	}

	public function getUser(): User
	{
		return $this->user;
	}

	public function getProject(): Project
	{
		return $this->project;
	}

	public function setAllocation(float $allocationSize): void
	{
		$this->allocation = $allocationSize;
	}

	public function getAllocation(): float
	{
		return $this->allocation;
	}

	public function setAllocationFTE(float $xfte): void
	{
		$this->allocation = $xfte * App::FTE;
	}

	public function getAllocationFTE(): float
	{
		return round($this->allocation / App::FTE, 2);
	}

	public function setTimespanFrom(?DateTime $from): void
	{
		$this->timespan_from = $from;
	}

	public function getTimespanFrom(): ?DateTime
	{
		return $this->timespan_from;
	}

	public function setTimespanTo(?DateTime $to): void
	{
		$this->timespan_to = $to;
	}

	public function getTimespanTo(): ?DateTime
	{
		return $this->timespan_to;
	}

	public function setDescription(?string $description): void
	{
		$this->description = $description;
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setState(string $state)
	{
		$this->state = $state;
	}

	public function getState(): string
	{
		return $this->state;
	}
}
