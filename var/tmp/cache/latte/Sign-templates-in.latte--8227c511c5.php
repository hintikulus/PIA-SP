<?php

use Latte\Runtime as LR;

/** source: /__app__/app/modules/Admin/Sign/templates/in.latte */
final class Template8227c511c5 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block #content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		/* line 2 */ $_tmp = $this->global->uiControl->getComponent("loginForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		
	}

}
