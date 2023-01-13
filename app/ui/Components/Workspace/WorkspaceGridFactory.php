<?php

namespace App\UI\Components\Workspace;

use App\UI\Components\Base\BaseFactoryTrait;

class WorkspaceGridFactory
{
	use BaseFactoryTrait;

	public function create(): WorkspaceGrid {
		return new WorkspaceGrid($this->em, $this->user, $this->translator);
	}
}
