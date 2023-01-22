<?php declare(strict_types = 1);

namespace App\Model;

final class App
{
	public const DESTINATION_ADMIN_HOMEPAGE = ':Admin:Home:';
	public const DESTINATION_SIGN_IN = ':Admin:Sign:in';
	public const DESTINATION_AFTER_SIGN_IN = self::DESTINATION_ADMIN_HOMEPAGE;
	public const DESTINATION_AFTER_SIGN_OUT = self::DESTINATION_ADMIN_HOMEPAGE;

	public const FTE = 40;

	public const DATETIME_FORMAT = "j. n. Y H:i";
	public const DATE_FORMAT = "j. n. Y";
	public const DATE_SHORT_FORMAT = "j. n.";
	public const TIME_FORMAT = "H:i";
}
