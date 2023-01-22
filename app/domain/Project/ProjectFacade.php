<?php

namespace App\Domain\Project;

use App\Domain\Base\BaseFacade;
use App\Model\Database\Entity\Project;
use Doctrine\ORM\QueryBuilder;

class ProjectFacade extends BaseFacade
{
	public function get(int $id): ?Project
	{
		return $this->em->getProjectRepository()->find($id);
	}

	public function create(array $data): ProjectFacadeResult
	{
		$user = $this->em->getUserRepository()->find($data['manager']);

		if($user === null)
		{
			return new ProjectFacadeResult(false, ProjectFacadeResult::ENTITY_NOT_FOUND);
		}

		$project = new Project($data['name'], $user, $data['description']);

		$this->em->persist($project);
		$this->em->flush();

		$result = new ProjectFacadeResult();
		$result->setProject($project);
		return $result;
	}

	public function edit(array $data): ProjectFacadeResult
	{
		$project = $this->get($data['id']);

		if($project === null) {
			return new ProjectFacadeResult(false, ProjectFacadeResult::ENTITY_NOT_FOUND);
		}

		$user = $this->em->getUserRepository()->find($data['manager']);

		if($user === null)
		{
			return new ProjectFacadeResult(false, ProjectFacadeResult::ENTITY_NOT_FOUND);
		}

		$project->setName($data['name']);
		$project->setDescription($data['description']);
		$project->setProjectManager($user);

		$this->em->persist($project);
		$this->em->flush();

		$result = new ProjectFacadeResult();
		$result->setProject($project);
		return $result;
	}

	public function getProjectManagersPairs(): array
	{
		return $this->em->getUserRepository()->findByNotDeletedPairs();
	}

	public function getQueryBuilderProjectsByManager(int $userId): QueryBuilder
	{
		return $this->em->getProjectRepository()->findByProjectManager($userId);
	}
}
