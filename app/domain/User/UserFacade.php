<?php

namespace App\Domain\User;

use App\Domain\Base\BaseFacade;
use App\Domain\Base\BaseFacadeResult;
use App\Model\Database\Entity\User;
use App\Model\Database\EntityManager;

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

}
