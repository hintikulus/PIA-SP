<?php

namespace App\Domain\User;

use App\Domain\Base\BaseFacade;
use App\Model\Database\Entity\User;

class UserFacade extends BaseFacade
{
	/**
	 * Získání uživatele zadaného identifikátorem
	 * @param int $id
	 * @return User|null
	 */
	public function get(int $id): ?User {
		return $this->em->getUserRepository()->find($id);
	}

	/**
	 * Vrátí entitu uživatele dle zadané emailové adresy
	 * @param string $email
	 * @return User|null
	 */
	public function getUserByEmail(string $email): ?User
	{
		return $this->em->getUserRepository()->findOneByEmail($email);
	}

}
