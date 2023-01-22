<?php

namespace App\Domain\Workspace;

use App\Domain\Base\BaseFacade;
use App\Domain\Base\BaseFacadeResult;
use App\Model\Database\Entity\Workspace;
use Doctrine\ORM\QueryBuilder;

class WorkspaceFacade extends BaseFacade
{
	public function get(int $id): ?Workspace
	{
		return $this->em->getWorkspaceRepository()->find($id);
	}

	public function getQueryBuilderForGrid(): QueryBuilder
	{
		return $this->em->getWorkspaceRepository()->findByNotDeleted();
	}

	public function create(array $data): WorkspaceFacadeResult
	{
		$workspace = new Workspace($data['name'], $data['shortcut']);

		$this->em->persist($workspace);
		$this->em->flush();

		return new WorkspaceFacadeResult();
	}

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
