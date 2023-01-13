<?php

use Latte\Runtime as LR;

/** source: /__app__/app/ui/Components/User/UserForm.latte */
final class Template74071458fd extends Latte\Runtime\Template
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
		$ʟ_input = $_input = end($this->global->formsStack)["login"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 6 */;
		echo '>Přihlašovací (orion) jméno</label>
	<div class="mb-3">
		<input class="form-control" placeholder="jannovak" autofocus';
		$ʟ_input = $_input = end($this->global->formsStack)["login"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null, 'placeholder' => null, 'autofocus' => null])->attributes() /* line 8 */;
		echo '>
	</div>

	<label';
		$ʟ_input = $_input = end($this->global->formsStack)["firstname"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 11 */;
		echo '>Křestní jméno</label>
	<div class="mb-3">
		<input class="form-control" placeholder="Jan" autofocus';
		$ʟ_input = $_input = end($this->global->formsStack)["firstname"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null, 'placeholder' => null, 'autofocus' => null])->attributes() /* line 13 */;
		echo '>
	</div>

	<label';
		$ʟ_input = $_input = end($this->global->formsStack)["lastname"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 16 */;
		echo '>Příjmení</label>
	<div class="mb-3">
		<input class="form-control" placeholder="Novák" autofocus';
		$ʟ_input = $_input = end($this->global->formsStack)["lastname"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null, 'placeholder' => null, 'autofocus' => null])->attributes() /* line 18 */;
		echo '>
	</div>

	<label';
		$ʟ_input = $_input = end($this->global->formsStack)["workspace"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 21 */;
		echo '>Oddělení</label>
	<div class="mb-3">
		';
		echo end($this->global->formsStack)["workspace"]->getControl()->addAttributes(['class' => "form-control"]) /* line 23 */;
		echo '
	</div>

	<div class="text-center">
		<button class="btn bg-gradient-info w-100 mt-4 mb-0"';
		$ʟ_input = $_input = end($this->global->formsStack)["submit"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null])->attributes() /* line 27 */;
		echo '>Přihlásit</button>
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
