<?php

namespace App\Modules\Admin\User;

use App\Modules\Admin\BaseAdminPresenter;
use App\UI\Components\User\UserGridFactory;

class UserPresenter extends BaseAdminPresenter
{
	/** @var UserGridFactory @inject */
	public UserGridFactory $userGridFactory;

	public function createComponentUserListGrid() {
		return $this->userGridFactory->create();
	}
}
