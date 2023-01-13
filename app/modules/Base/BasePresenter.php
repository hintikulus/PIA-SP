<?php declare(strict_types = 1);

namespace App\Modules\Base;

use App\Model\Latte\TemplateProperty;
use App\Model\Security\SecurityUser;
use App\UI\Control\TFlashMessage;
use App\UI\Control\TModuleUtils;
use Contributte\Application\UI\Presenter\StructuredTemplates;
use Contributte\Translation\LocalesResolvers\Session;
use Nette\Application\UI\Presenter;
use Nette\Localization\ITranslator;
use Nette\Security\User;

/**
 * @property-read TemplateProperty $template
 * @property-read SecurityUser $user
 */
abstract class BasePresenter extends Presenter
{

	/** @var ITranslator @inject */
	public $translator;

	/** @var Session @inject */
	public $translatorSessionResolver;

	/** @var User @inject */
	public $user;

	use StructuredTemplates;
	use TFlashMessage;
	use TModuleUtils;

	public function beforeRender()
	{
		$this->template->user = $this->user;
	}

	public function handleChangeLocale(string $locale): void
	{
		$this->translatorSessionResolver->setLocale($locale);
		$this->redirect('this');
	}

}
