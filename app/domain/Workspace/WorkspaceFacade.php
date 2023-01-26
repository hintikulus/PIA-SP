<?php

namespace App\Domain\Workspace;

use App\Domain\Base\BaseFacade;
use App\Domain\Base\BaseFacadeResult;
use App\Model\Database\Entity\Workspace;
use Doctrine\ORM\QueryBuilder;

class WorkspaceFacade extends BaseFacade
{
	/**
	 * Získání entity o zadaném identifikátoru
	 * @param int $id
	 * @return Workspace|null
	 */
	public function get(int $id): ?Workspace
	{
		return $this->em->getWorkspaceRepository()->find($id);
	}

	/**
	 * Získá dotaz pro získání všech oddělení
	 * @return QueryBuilder
	 */
	public function getQueryBuilderForGrid(): QueryBuilder
	{
		return $this->em->getWorkspaceRepository()->findByNotDeleted();
	}

	/**
	 * Vytvoření nového oddělení z dat z formuláře
	 * @param mixed[] $data
	 * @return WorkspaceFacadeResult
	 */
	public function create(array $data): WorkspaceFacadeResult
	{
		$workspace = new Workspace($data['name'], $data['shortcut']);

		$this->em->persist($workspace);
		$this->em->flush();

		return new WorkspaceFacadeResult();
	}

	/**
	 * Úprava oddělení na základě dat z formuláře
	 * @param mixed[] $data
	 * @return WorkspaceFacadeResult
	 */
	public function edit(array $data): WorkspaceFacadeResult
	{
		$workspace = $this->get($data['id']);

		if ($workspace === null)
		{
			return new WorkspaceFacadeResult(false, WorkspaceFacadeResult::ENTITY_NOT_FOUND);
		}

		$workspace->setName($data['name']);
		$workspace->setShortcut($data['shortcut']);

		$this->em->persist($workspace);
		$this->em->flush();

		return new WorkspaceFacadeResult();
	}

	/**
	 * Odstranění oddělení zadaného identifikátorem
	 * @param int $id
	 * @return WorkspaceFacadeResult
	 */
	public function delete(int $id): WorkspaceFacadeResult
	{
		$workspace = $this->get($id);

		if($workspace === null)
		{
			return new WorkspaceFacadeResult(false, WorkspaceFacadeResult::ENTITY_NOT_FOUND);
		}

		$workspace->setDeleted();

		$this->em->persist($workspace);
		$this->em->flush();

		return new WorkspaceFacadeResult();
	}
}
