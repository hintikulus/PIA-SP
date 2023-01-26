<?php

namespace Tests\Integration\Database\Entity;

use App\Domain\User\UserFacade;
use App\Model\Database\EntityManager;
use Tester\Assert;

/** @var Container $container */

use App\Model\Database\Entity\User;
use Nette\DI\Container;

$container = require_once __DIR__ . '/../../../../bootstrap.container.php';

test(function() use ($container) {
	$user = new User('Petr', 'Pavel', 'petr@pavel.cz', 'petrp', 'passwordHash');
	$user->setRole(User::ROLE_DEPARTMENT_MANAGER);

	Assert::equal('Petr', $user->getFirstname());
	Assert::equal('Pavel', $user->getLastname());
	Assert::equal('petr@pavel.cz', $user->getEmail());
	Assert::equal('petrp', $user->getLogin());
	Assert::equal('passwordHash', $user->getPasswordHash());

	Assert::equal('Petr Pavel', $user->getFullname());
	Assert::equal(User::ROLE_DEPARTMENT_MANAGER, $user->getRole());
	Assert::equal(false, $user->isDeleted());

});

test(function() use ($container)
{
	$user = new User('Petr', 'Pavel', 'petr@pavel.cz', 'petrp', 'passwordHash');
	$em = $container->getByType(EntityManager::class);
	$userFacade = $container->getByType(UserFacade::class);


});
