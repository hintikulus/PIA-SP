<?php declare(strict_types = 1);

namespace App\UI\Form;

use Nette\Application\UI\Form;
use Nette\Forms\Controls\TextInput;

class BaseForm extends Form
{

	public function addFloat(string $name, ?string $label = null): TextInput
	{
		$input = self::addText($name, $label);
		$input->addCondition(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 255)
			->addRule(self::FLOAT)
		;

		return $input;
	}

	public function addNumeric(string $name, ?string $label = null): TextInput
	{
		$input = self::addText($name, $label);
		$input->addCondition(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 255)
			->addRule(self::NUMERIC)
		;

		return $input;
	}

	public function addDatetime(string $name, ?string $label = null): TextInput
	{
		$input = self::addText($name, $label);
		$input->setHtmlAttribute('type', 'datetime-local')
			->addCondition(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 255)
		;

		return $input;
	}

	public function addDate(string $name, ?string $label = null): TextInput
	{
		$input = self::addText($name, $label);
		$input->setHtmlAttribute('type', 'date')
			->addCondition(self::FILLED)
			->addRule(self::MAX_LENGTH, null, 255)
		;

		return $input;
	}

}
