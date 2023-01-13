<?php

use Latte\Runtime as LR;

/** source: /__app__/app/modules/Admin/User/templates/list.latte */
final class Template47458a8c8c extends Latte\Runtime\Template
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
	<div class="col-12">
		<div class="card mb-4">
			<div class="card-header pb-0">
				<div class="row">
					<div class="col-lg-6 col-7">
						<h6>Uživatelé</h6>
					</div>
					<div class="col-lg-6 col-5 my-auto text-end">
';
		if ($user->isAllowed('Admin:User:add')) /* line 11 */ {
			echo '						<a class="btn btn-outline-primary btn-sm mb-0" href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link(":add")) /* line 11 */;
			echo '">Přidat uživatele</a>
';
		}
		echo '					</div>
				</div>
			</div>
			<div class="card-body px-0 pt-0 pb-2">
				<div class="table-responsive p-0">
';
		/* line 17 */ $_tmp = $this->global->uiControl->getComponent("userListGrid");
		if ($_tmp instanceof Nette\Application\UI\Renderable) $_tmp->redrawControl(null, false);
		$_tmp->render();
		echo '				</div>
			</div>
		</div>
	</div>
</div>
';
	}

}
