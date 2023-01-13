<?php

use Latte\Runtime as LR;

/** source: /__app__/app/ui/Components/Workspace/WorkspaceForm.latte */
final class Template7b38315135 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$form = $this->global->formsStack[] = $this->global->uiControl["form"] /* line 1 */;
		echo '<form class="form-signin"';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), ['class' => null], false);
		echo '>
';
		$iterations = 0;
		foreach ($form->errors as $error) /* line 2 */ {
			echo '	<div class="alert alert-danger" role="alert">
		';
			echo LR\Filters::escapeHtmlText($error) /* line 3 */;
			echo '
	</div>
';
			$iterations++;
		}
		echo '
	<label';
		$ʟ_input = $_input = end($this->global->formsStack)["name"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 6 */;
		echo '>Název</label>
	<div class="mb-3">
		<input class="form-control" placeholder="Oddělení medicínské informatiky" autofocus';
		$ʟ_input = $_input = end($this->global->formsStack)["name"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null, 'placeholder' => null, 'autofocus' => null])->attributes() /* line 8 */;
		echo '>
	</div>

	<label';
		$ʟ_input = $_input = end($this->global->formsStack)["shortcut"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 11 */;
		echo '>Zkratka</label>
	<div class="mb-3">
		<input class="form-control" placeholder="OMI" autofocus';
		$ʟ_input = $_input = end($this->global->formsStack)["shortcut"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null, 'placeholder' => null, 'autofocus' => null])->attributes() /* line 13 */;
		echo '>
	</div>

	<div class="row">
		<div class="col-6 text-center">
			<button class="btn bg-gradient-info w-100 mt-4 mb-0"';
		$ʟ_input = $_input = end($this->global->formsStack)["submit"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null])->attributes() /* line 18 */;
		echo '>Uložit</button>
		</div>
		<div class="col-6 text-center">
			<a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($presenter->link('list'))) /* line 21 */;
		echo '" class="btn btn-secondary w-100 mt-4 mb-0">Zrušit</a>
		</div>
	</div>
';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), false) /* line 1 */;
		echo '</form>
';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['error' => '2'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
