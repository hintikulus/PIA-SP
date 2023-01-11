<?php

use Latte\Runtime as LR;

/** source: /__app__/app/ui/Datagrid/datagrid_filter_text.latte */
final class Template8d4cdea037 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		if ($outer) /* line 6 */ {
			echo '	<div class="row">
		';
			$ʟ_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
			if ($ʟ_label = $ʟ_input->getLabel()) echo $ʟ_label->addAttributes(['class' => 'col-sm-3 control-label']);
			echo '
		<div class="col-sm-9">
			';
			$ʟ_input = $_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
			echo $ʟ_input->getControl() /* line 10 */;
			echo '
		</div>
	</div>
';
		} else /* line 13 */ {
			echo '	';
			$ʟ_input = $_input = is_object($input) ? $input : end($this->global->formsStack)[$input];
			echo $ʟ_input->getControl() /* line 14 */;
			echo "\n";
		}
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
