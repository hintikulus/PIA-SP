<?php

namespace App\UI\Components\Workspace;

interface WorkspaceFormFactory
{
	public function create(?int $id): WorkspaceForm;
}
