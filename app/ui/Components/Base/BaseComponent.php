<?php

namespace App\UI\Components\Base;

use App\Model\Database\EntityManager;
use Contributte\Translation\Translator;
use Nette\Application\LinkGenerator;
use Nette\Application\UI\Control;
use Nette\Security\User;

class BaseComponent extends Control
{
	private ?string $componentName = null;
	private ?string $componentNameWithPath = null;
	protected ?string $latteFile = null;

	protected EntityManager $em;
	protected User $user;
	protected Translator $translator;
	protected LinkGenerator $linkGenerator;

	public function __construct(EntityManager $em, User $user, Translator $translator)
	{
		$this->em = $em;
		$this->user = $user;
		$this->translator = $translator;
	}

	public function render(mixed $params = null): void
	{
		if (empty($this->latteFile))
		{
			$this->latteFile = $this->getComponentNameWithPath();
		}

		$this->getTemplate()->setFile($this->latteFile . '.latte');
		$this->getTemplate()->componentName = $this->getComponentName();
		bdump($this);
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
