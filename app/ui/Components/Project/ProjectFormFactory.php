<?php

namespace App\UI\Components\Project;

interface ProjectFormFactory
{
	public function create(?int $id): ProjectForm;
}
