<?php

use Latte\Runtime as LR;

/** source: /__app__/app/ui/Components/UserSettings/PasswordChangeForm.latte */
final class Template85b397e680 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$form = $this->global->formsStack[] = $this->global->uiControl["form"] /* line 1 */;
		echo '<form class="pt-0"';
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
		$ʟ_input = $_input = end($this->global->formsStack)["old_password"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 6 */;
		echo '>Aktuální heslo</label>
	<div class="mb-3">
		<input type="password" class="form-control" placeholder="Password"';
		$ʟ_input = $_input = end($this->global->formsStack)["old_password"];
		echo $ʟ_input->getControlPart()->addAttributes(['type' => null, 'class' => null, 'placeholder' => null])->attributes() /* line 8 */;
		echo '>
	</div>

	<label';
		$ʟ_input = $_input = end($this->global->formsStack)["new_password"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 11 */;
		echo '>Nové heslo</label>
	<div class="mb-3">
		<input type="password" class="form-control" placeholder="Password"';
		$ʟ_input = $_input = end($this->global->formsStack)["new_password"];
		echo $ʟ_input->getControlPart()->addAttributes(['type' => null, 'class' => null, 'placeholder' => null])->attributes() /* line 13 */;
		echo '>
	</div>

	<label';
		$ʟ_input = $_input = end($this->global->formsStack)["new_password_again"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 16 */;
		echo '>Nové heslo (znovu)</label>
	<div class="mb-3">
		<input type="password" class="form-control" placeholder="Password"';
		$ʟ_input = $_input = end($this->global->formsStack)["new_password_again"];
		echo $ʟ_input->getControlPart()->addAttributes(['type' => null, 'class' => null, 'placeholder' => null])->attributes() /* line 18 */;
		echo '>
	</div>

	<div class="text-center">
		<button class="btn bg-gradient-info w-100 mt-4 mb-0"';
		$ʟ_input = $_input = end($this->global->formsStack)["submit"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null])->attributes() /* line 22 */;
		echo '>Změnit</button>
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
