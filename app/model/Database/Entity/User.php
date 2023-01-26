<?php declare(strict_types = 1);

namespace App\Model\Database\Entity;

use App\Model\Database\Entity\Attributes\TDeleted;
use App\Model\Database\Entity\Attributes\TId;
use App\Model\Security\Identity;
use App\Model\Security\Passwords;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\PersistentCollection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\UserRepository")
 * @ORM\Table(name="`user`")
 * @ORM\HasLifecycleCallbacks
 */
class User extends AbstractEntity
{
	public const ROLE_USER = 'user';
	public const ROLE_SUPERIOR = 'superior';
	public const ROLE_DEPARTMENT_MANAGER = "department_manager";
	public const ROLE_SECRETARIAT = "secretariat";

	public const STATE_FRESH = 1;
	public const STATE_ACTIVATED = 2;
	public const STATE_BLOCKED = 3;

	public const STATES = [self::STATE_FRESH, self::STATE_BLOCKED, self::STATE_ACTIVATED];

	use TId;
	use TDeleted;

	//use TCreatedAt;
	//use TUpdatedAt;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=255, nullable=FALSE, unique=false)
	 */
	private $login;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=255, nullable=FALSE, unique=false)
	 */
	private $firstname;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=255, nullable=FALSE, unique=false)
	 */
	private $lastname;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=255, nullable=FALSE, unique=TRUE)
	 */
	private $email;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=255, nullable=FALSE)
	 */
	private $password;

	/**
	 * @var string
	 * @ORM\Column(type="string", length=255, nullable=FALSE)
	 */
	private $role;

	/**
	 * @var DateTime|NULL
	 * @ORM\Column(type="datetime", nullable=TRUE)
	 */
	private ?DateTime $lastLoggedAt;

	/**
	 * @var Collection<int, Project>
	 * @ORM\OneToMany(targetEntity="Project", mappedBy="projectManager")
	 */
	private Collection $managedProjects;

	/**
	 * @var Collection<int, ProjectAllocation>
	 * @ORM\OneToMany(targetEntity="ProjectAllocation", mappedBy="project")
	 */
	private Collection $projectAllocations;

	/**
	 * @var Collection<int, User>
	 * @ORM\OneToMany(targetEntity="UserSuperiorUser", mappedBy="superiorUser")
	 */
	private Collection $superiors;

	/**
	 * @var Collection<int, User>
	 * @ORM\OneToMany(targetEntity="UserSuperiorUser", mappedBy="user")
	 */
	private Collection $subordinates;


	public function __construct(string $firstname, string $lastname, string $email, string $login, string $passwordHash)
	{
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->email = $email;
		$this->login = $login;
		$this->password = $passwordHash;

		$this->role = self::ROLE_USER;

		$this->projectAllocations = new ArrayCollection();
	}

	public function changeLoggedAt(): void
	{
		$this->lastLoggedAt = new DateTime();
	}

	public function getEmail(): string
	{
		return $this->email;
	}

	public function getLogin(): string
	{
		return $this->login;
	}

	public function changeLogin(string $login): void
	{
		$this->login = $login;
	}

	public function getLastLoggedAt(): ?DateTime
	{
		return $this->lastLoggedAt;
	}

	public function getRole(): string
	{
		return $this->role;
	}

	public function setRole(string $role): void
	{
		$this->role = $role;
	}

	public function getPasswordHash(): string
	{
		return $this->password;
	}

	public function changePasswordHash(string $password): void
	{
		$this->password = $password;
	}

	public function getFirstname(): string
	{
		return $this->firstname;
	}

	public function getLastname(): string
	{
		return $this->lastname;
	}

	public function getFullname(): string
	{
		return $this->firstname . ' ' . $this->lastname;
	}

	public function rename(string $firstname, string $lastname): void
	{
		$this->firstname = $firstname;
		$this->lastname = $lastname;
	}

	public function getGravatar(): string
	{
		return 'https://www.gravatar.com/avatar/' . md5($this->email);
	}

	public function toIdentity(): Identity
	{
		return new Identity($this->getId(), [$this->role], [
			'email'     => $this->email,
			'firstname' => $this->firstname,
			'lastname'  => $this->lastname,
			//'state' => $this->state,
			'gravatar'  => $this->getGravatar(),
		]);
	}

	public function addManagedProject(Project $project): void
	{
		$this->managedProjects->add($project);
	}
}
