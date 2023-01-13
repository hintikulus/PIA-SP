<?php

use Latte\Runtime as LR;

/** source: /__app__/app/modules/Admin/Workspace/templates/add.latte */
final class Templateea01574513 extends Latte\Runtime\Template
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
	<div class="col-sm-6 col-md-6 col-lg-4 mx-auto">
		<div class="card">
			<div class="card-header pb-0">
				<h6>';
		
		$ᴛ_contributteTranslationMessage = "admin.workspace.form.title_add";

		if (is_string($ᴛ_contributteTranslationMessage)) {
			$ᴛ_contributteTranslationMessage = isset($ᴛ_contributteTranslationPrefix) && !\Contributte\Translation\Helpers::isAbsoluteMessage("admin.workspace.form.title_add") ? implode(".", $ᴛ_contributteTranslationPrefix) . "." . "admin.workspace.form.title_add" : "admin.workspace.form.title_add";
		}

		echo LR\Filters::escapeHtmlText(call_user_func($this->filters->translate, $ᴛ_contributteTranslationMessage));
		echo '</h6>
			</div>
			<div class="card-body pt-0">
';
		/* line 9 */ $_tmp = $this->global->uiControl->getComponent("workspaceForm");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		echo '			</div>
		</div>
	</div>
</div>

';
	}

}
