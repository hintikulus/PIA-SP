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
		$this->addRole(User::ROLE_DEPARTMENT_MANAGER, User::ROLE_USER);
		$this->addRole(User::ROLE_SECRETARIAT, User::ROLE_USER);
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
		$this->addResource('Admin:Workspace', 'Admin');

		// PODAKCE
		$this->addResource('Admin:User:list', 'Admin:User');
		$this->addResource('Admin:User:add', "Admin:User");
		$this->addResource('Admin:User:edit', "Admin:User");

		$this->addResource('Admin:Project:list', 'Admin:Project');
		$this->addResource('Admin:Project:add', 'Admin:Project');
		$this->addResource('Admin:Project:edit', 'Admin:Project');

		$this->addResource('Admin:Workspace:list', 'Admin:Workspace');
		$this->addResource('Admin:Workspace:add', 'Admin:Workspace');
		$this->addResource('Admin:Workspace:edit', 'Admin:Workspace');

		$this->addResource("Admin:UserSettings", "Admin:Home");
	}

	/**
	 * Setup ACL
	 */
	protected function addPermissions(): void
	{
		$this->allow(User::ROLE_USER, [
			'Admin:Home',
			'Admin:UserSettings',
		]);

		$this->allow(User::ROLE_DEPARTMENT_MANAGER, [
		]);

		$this->allow(User::ROLE_SECRETARIAT, [
			'Admin:User',
			'Admin'
		]);
	}

}
