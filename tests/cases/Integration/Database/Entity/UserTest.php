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

$container = require_once __DIR__ . '/../../../../bootstrap.container.php';

$mockEm = \Mockery::mock(EntityManager::class);

test(function() use ($mockEm)
{
	$email = 'test@example.com';
	$expectedUser = new User('Petr', 'Pavel', $email, 'pavelp', 'password');

	$mockUserRepository = Mockery::mock(UserRepository::class);
	$mockUserRepository->shouldReceive('findOneByEmail')->with($email)->andReturn($expectedUser);

	$mockEntityManager = Mockery::mock(EntityManager::class);
	$mockEntityManager->shouldReceive('getUserRepository')->andReturn($mockUserRepository);

	$facade = new UserFacade($mockEntityManager);

	$result = $facade->getUserByEmail($email);

	Assert::same($expectedUser, $result);
	\Mockery::close();
});
