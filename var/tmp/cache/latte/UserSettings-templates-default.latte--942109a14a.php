<?php

use Latte\Runtime as LR;

/** source: /__app__/app/modules/Admin/UserSettings/templates/default.latte */
final class Template942109a14a extends Latte\Runtime\Template
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
		echo '<div class="row">
	<div class="col-sm-4 mx-auto">
		<div class="card">
			<div class="card-header pb-0">
				<h6>Změna hesla</h6>
			</div>
			<div class="card-body pt-0">
';
		/* line 9 */ $_tmp = $this->global->uiControl->getComponent("passwordChangeForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		echo '			</div>
		</div>
	</div>
</div>

';
	}

}
