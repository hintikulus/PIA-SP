<?php

namespace App\UI\Components\Workspace;

use App\UI\Components\Base\BaseFactoryTrait;

class WorkspaceFormFactory
{
	use BaseFactoryTrait;

	public function create(int $id = null): WorkspaceForm {
		return new WorkspaceForm($this->em, $this->user, $this->translator, $id);
	}
}
