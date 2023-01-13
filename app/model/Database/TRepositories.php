<?php declare(strict_types = 1);

namespace App\Model\Database;

use App\Model\Database\Entity\User;
use App\Model\Database\Entity\Project;
use App\Model\Database\Entity\Workspace;
use App\Model\Database\Repository\ProjectRepository;
use App\Model\Database\Repository\UserRepository;
use App\Model\Database\Repository\WorkspaceRepository;

/**
 * @mixin EntityManager
 */
trait TRepositories
{
	public function getProjectRepository(): ProjectRepository
	{
		return $this->getRepository(Project::class);
	}

	public function getUserRepository(): UserRepository
	{
		return $this->getRepository(User::class);
	}

	public function getWorkspaceRepository(): WorkspaceRepository
	{
		return $this->getRepository(Workspace::class);
	}

}
