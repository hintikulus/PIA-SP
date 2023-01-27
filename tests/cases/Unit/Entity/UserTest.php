<?php

namespace Tests\Integration\Database\Entity;

use App\Domain\User\UserFacade;
use App\Model\Database\EntityManager;
use App\Model\Database\Repository\UserRepository;
use Doctrine\Persistence\ObjectRepository;
use Mockery;
use Tester\Assert;

/** @var Container $container */

use App\Model\Database\Entity\User;
use Nette\DI\Container;

$container = require_once __DIR__ . '/../../../bootstrap.container.php';

$mockEm = \Mockery::mock(EntityManager::class);
$facade = new UserFacade($mockEm);

test(function() use ($container) {
	$user = new User('Petr', 'Pavel', 'petr@pavel.cz', 'petrp', 'passwordHash');
	$user->setRole(User::ROLE_DEPARTMENT_MANAGER);

	Assert::equal('Petr', $user->getFirstname());
	Assert::equal('Pavel', $user->getLastname());
	Assert::equal('petr@pavel.cz', $user->getEmail());
	Assert::equal('petrp', $user->getLogin());
	Assert::equal('passwordHash', $user->getPasswordHash());
	Assert::equal(User::ROLE_DEPARTMENT_MANAGER, $user->getRole());

	Assert::equal(false, $user->isDeleted());

});

test(function() {
	$user = new User('Petr', 'Pavel', 'petr@pavel.cz', 'petrp', 'passwordHash');
	Assert::equal('Petr Pavel', $user->getFullname());
});

test(function() {
	$user = new User('Petr', 'Pavel', 'petr@pavel.cz', 'petrp', 'passwordHash');

	$user->changePasswordHash("newPassword");
	Assert::equal("newPassword", $user->getPasswordHash());;
});

test(function() {
	$user = new User('Petr', 'Pavel', 'petr@pavel.cz', 'petrp', 'passwordHash');
	$user->rename('Josef', 'Novak');

	Assert::equal('Josef', $user->getFirstname());
	Assert::equal('Novak', $user->getLastname());

	Assert::equal('Josef Novak', $user->getFullname());
});
