<?php

use Latte\Runtime as LR;

/** source: /__app__/app/ui/Components/User/UserGrid.latte */
final class Template4979b096dd extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		/* line 1 */ $_tmp = $this->global->uiControl->getComponent("grid");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}