<?php

use Latte\Runtime as LR;

/** source: /__app__/app/ui/Components/Sign/SignInForm.latte */
final class Template1fbff3ecdd extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		$form = $this->global->formsStack[] = $this->global->uiControl["form"] /* line 1 */;
		echo '<form class="form-signin"';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), ['class' => null], false);
		echo '>
	<div class="text-center mb-4">
		<img class="mb-4" src="https://avatars0.githubusercontent.com/u/99965?s=200&v=4" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Webapp Skeleton Admin</h1>
	</div>

';
		$iterations = 0;
		foreach ($form->errors as $error) /* line 7 */ {
			echo '	<div class="alert alert-danger" role="alert">
		';
			echo LR\Filters::escapeHtmlText($error) /* line 8 */;
			echo '
	</div>
';
			$iterations++;
		}
		echo '
	<div class="form-label-group">
		<input type="email" class="form-control" placeholder="Email address" required autofocus';
		$ʟ_input = $_input = end($this->global->formsStack)["email"];
		echo $ʟ_input->getControlPart()->addAttributes(['type' => null, 'class' => null, 'placeholder' => null, 'required' => null, 'autofocus' => null])->attributes() /* line 12 */;
		echo '>
		<label';
		$ʟ_input = $_input = end($this->global->formsStack)["email"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 13 */;
		echo '>Email address</label>
	</div>

	<div class="form-label-group">
		<input type="password" class="form-control" placeholder="Password" required';
		$ʟ_input = $_input = end($this->global->formsStack)["password"];
		echo $ʟ_input->getControlPart()->addAttributes(['type' => null, 'class' => null, 'placeholder' => null, 'required' => null])->attributes() /* line 17 */;
		echo '>
		<label';
		$ʟ_input = $_input = end($this->global->formsStack)["password"];
		echo $ʟ_input->getLabelPart()->attributes() /* line 18 */;
		echo '>Password</label>
	</div>

	<div class="checkbox mb-3">
		<label>
			<input type="checkbox"';
		$ʟ_input = $_input = end($this->global->formsStack)["remember"];
		echo $ʟ_input->getControlPart()->addAttributes(['type' => null])->attributes() /* line 23 */;
		echo '> Remember me
		</label>
	</div>
	<button class="btn btn-lg btn-primary btn-block"';
		$ʟ_input = $_input = end($this->global->formsStack)["submit"];
		echo $ʟ_input->getControlPart()->addAttributes(['class' => null])->attributes() /* line 26 */;
		echo '>Sign in</button>
	<p class="mt-5 mb-3 text-muted text-center">&copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 27 */;
		echo '</p>
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
			foreach (array_intersect_key(['error' => '7'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
