<?php

namespace App\Domain\Project;

use App\Domain\Base\BaseFacade;
use App\Model\Database\Entity\Project;
use Doctrine\ORM\QueryBuilder;

class ProjectFacade extends BaseFacade
{
	/**
	 * Získání entity Projektu
	 * @param int $id
	 * @return Project|null
	 */
	public function get(int $id): ?Project
	{
		return $this->em->getProjectRepository()->find($id);
	}

	/**
	 * Vytvoření nového projektu s daty z formuláře
	 * @param mixed[] $data
	 * @return ProjectFacadeResult
	 */
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

	/**
	 * Editace projektu s daty z formuláře
	 * @param mixed[] $data
	 * @return ProjectFacadeResult
	 */
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

	/**
	 * Získání seznamu uživatelů v poli pro select input,
	 * kde klic je id a hodnota název uzivatele
	 * @return string[]
	 */
	public function getProjectManagersPairs(): array
	{
		return $this->em->getUserRepository()->findByNotDeletedPairs();
	}

	/**
	 * Získání instance QueryBuilder pro ziskani projektu, ktere managuje zadaný uživatel
	 * @param int $userId
	 * @return QueryBuilder
	 */
	public function getQueryBuilderProjectsByManager(int $userId): QueryBuilder
	{
		return $this->em->getProjectRepository()->findByProjectManager($userId);
	}
}
