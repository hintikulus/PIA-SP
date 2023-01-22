<?php

namespace App\Model\Database\Entity;

use App\Model\Database\Entity\Attributes\TDeleted;
use App\Model\Database\Entity\Attributes\TId;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Model\Database\Repository\UserSuperiorUserRepository")
 * @ORM\Table(name="`user_superior_user`")
 * @ORM\HasLifecycleCallbacks
 */
class UserSuperiorUser extends AbstractEntity
{
	use TId;
	use TDeleted;

	/**
	 * @var User
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="subordinates")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 */
	private User $user;

	/**
	 * @var User
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="superiors")
	 * @ORM\JoinColumn(name="superior_user_id", referencedColumnName="id")
	 */
	private User $superiorUser;

	public function __construct(
		User $user,
		User $superiorUser,
	)
	{
		$this->user = $user;
		$this->superiorUser = $superiorUser;
	}

	public function getUser(): User
	{
		return $this->user;
	}

	public function getSuperiorUser(): User
	{
		return $this->superiorUser;
	}
}
