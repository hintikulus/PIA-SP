<?php

namespace App\Modules\Admin\User;

use App\Model\App;
use App\Modules\Admin\BaseAdminPresenter;
use App\UI\Components\User\UserFormFactory;
use App\UI\Components\User\UserGridFactory;
use Nette\Application\UI\ComponentReflection;

class UserPresenter extends BaseAdminPresenter
{
	/** @var UserGridFactory @inject */
	public UserGridFactory $userGridFactory;

	/** @var UserFormFactory @inject */
	public UserFormFactory $userFormFactory;

	public function createComponentUserListGrid()
	{
		return $this->userGridFactory->create();
	}

	public function createComponentUserForm() {
		return $this->userFormFactory->create();
	}

	/**
	 * @param ComponentReflection|mixed $element
	 * @phpcsSuppress SlevomatCodingStandard.TypeHints.TypeHintDeclaration.MissingParameterTypeHint
	 */
	public function checkRequirements($element): void
	{
		parent::checkRequirements($element);

		if (!$this->user->isAllowed('Admin:User:list'))
		{
			$this->flashError('You cannot access this with user role');
			$this->redirect(App::DESTINATION_ADMIN_HOMEPAGE);
		}
	}
}
