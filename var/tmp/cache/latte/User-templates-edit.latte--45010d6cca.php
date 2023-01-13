<?php

use Latte\Runtime as LR;

/** source: /__app__/app/modules/Admin/User/templates/edit.latte */
final class Template45010d6cca extends Latte\Runtime\Template
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
		echo '<div class="row">
	<div class="col-sm-4 mx-auto">
		<div class="card">
			<div class="card-header pb-0">
				<h6>Úprava uživatele</h6>
			</div>
			<div class="card-body pt-0">

			</div>
		</div>
	</div>
</div>
';
	}

}
