<?php declare(strict_types = 1);

namespace App\Model\Security\Authorizator;

use App\Model\Database\Entity\User;
use Nette\Security\Permission;

final class StaticAuthorizator extends Permission
{

	/**
	 * Create ACL
	 */
	public function __construct()
	{
		$this->addRoles();
		$this->addResources();
		$this->addPermissions();
	}

	/**
	 * Setup roles
	 */
	protected function addRoles(): void
	{
		$this->addRole(User::ROLE_USER);
		$this->addRole(User::ROLE_DEPARTMENT_MANAGER);
		$this->addRole(User::ROLE_SECRETARIAT);
	}

	/**
	 * Setup resources
	 */
	protected function addResources(): void
	{
		// MODUL
		$this->addResource('Admin');

		// HLAVNI ENTITY
		$this->addResource('Admin:Home', 'Admin');
		$this->addResource('Admin:User', 'Admin');
		$this->addResource('Admin:Project', 'Admin');

		// PODAKCE
		$this->addResource('Admin:User:list', 'Admin:User');
		$this->addResource('Admin:Project:list', 'Admin:Project');
	}

	/**
	 * Setup ACL
	 */
	protected function addPermissions(): void
	{
		$this->allow(User::ROLE_USER, [
			'Admin:Home',
		]);

		$this->allow(User::ROLE_DEPARTMENT_MANAGER, [
			'Admin:Home',
		]);

		$this->allow(User::ROLE_SECRETARIAT, [
			'Admin:Home',
			'Admin:User',
			'Admin'
		]);
	}

}
