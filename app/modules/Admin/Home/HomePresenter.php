<?php declare(strict_types = 1);

namespace App\Modules\Admin\Home;

use App\Domain\Order\Event\OrderCreated;
use App\Modules\Admin\BaseAdminPresenter;
use App\Modules\Base\SecuredPresenter;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class HomePresenter extends BaseAdminPresenter
{

	/** @var EventDispatcherInterface @inject */
	public $dispatcher;

	protected function createComponentOrderForm(): Form
	{
		$form = new Form();

		$form->addText('order', 'Order name')
			->setRequired(true);
		$form->addSubmit('send', 'OK');

		$form->onSuccess[] = function (Form $form): void {
			$this->dispatcher->dispatch(new OrderCreated($form->values->order), OrderCreated::NAME);
		};

		return $form;
	}

}
