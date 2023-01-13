<?php

namespace App\Modules\Admin\UserSettings;

use App\Modules\Admin\BaseAdminPresenter;
use App\UI\Components\UserSettings\PasswordChangeForm;
use App\UI\Components\UserSettings\PasswordChangeFormFactory;
use App\UI\Form\BaseForm;

class UserSettingsPresenter extends BaseAdminPresenter
{
	/** @var PasswordChangeFormFactory @inject */
	public PasswordChangeFormFactory $passwordChangeFormFactory;

	public function createComponentPasswordChangeForm(): PasswordChangeForm {
		return $this->passwordChangeFormFactory->create();
	}

}
