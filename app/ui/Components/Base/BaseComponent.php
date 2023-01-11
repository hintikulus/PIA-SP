<?php

namespace App\UI\Components\Base;

use Nette\Application\UI\Control;

class BaseComponent extends Control
{
	private ?string $componentName = null;
	private ?string $componentNameWithPath = null;
	protected ?string $latteFile = null;

	public function render($params = null)
	{
		if (empty($this->latteFile))
		{
			$this->latteFile = $this->getComponentNameWithPath();
		}

		$this->getTemplate()->setFile($this->latteFile . '.latte');
		$this->getTemplate()->componentName = $this->getComponentName();
		$this->getTemplate()->render();
	}

	public function getComponentName(): string
	{
		if ($this->componentName === null)
		{
			$this->componentName = $this->getReflection()->getShortName();
		}

		return $this->componentName;
	}

	public function getComponentNameWithPath(): ?string
	{
		if ($this->componentNameWithPath === null)
		{
			$fileName = $this->getReflection()->getFileName();
			if (!empty($fileName))
			{
				$this->componentNameWithPath = str_replace(".php", "", $fileName);
			}
		}

		return $this->componentNameWithPath;
	}

	protected function idTransform(?string $id = null): ?int
	{
		if($id === null) return null;

		if(empty($id)) return null;

		if(!is_numeric($id)) return null;

		return intval($id);
	}
}
