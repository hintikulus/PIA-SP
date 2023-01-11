<?php
// source: /__app__/app/../config/env/prod.neon
// source: /__app__/app/../config/local.neon
// source: array
// source: array

/** @noinspection PhpParamsInspection,PhpMethodMayBeStaticInspection */

declare(strict_types=1);

class Container_6a10a49a37 extends Nette\DI\Container
{
	protected $tags = [
		'console.command' => [
			'06' => 'hello',
			'nettrine.fixtures.loadDataFixturesCommand' => 'doctrine:fixtures:load',
			'nettrine.migrations.currentCommand' => 'migrations:current',
			'nettrine.migrations.diffCommand' => 'migrations:diff',
			'nettrine.migrations.dumpSchemaCommand' => 'migrations:dump-schema',
			'nettrine.migrations.executeCommand' => 'migrations:execute',
			'nettrine.migrations.generateCommand' => 'migrations:generate',
			'nettrine.migrations.latestCommand' => 'migrations:latest',
			'nettrine.migrations.listCommand' => 'migrations:list',
			'nettrine.migrations.migrateCommand' => 'migrations:migrate',
			'nettrine.migrations.rollupCommand' => 'migrations:rollup',
			'nettrine.migrations.statusCommand' => 'migrations:status',
			'nettrine.migrations.syncMetadataCommand' => 'migrations:sync-metadata-storage',
			'nettrine.migrations.upToDateCommand' => 'migrations:up-to-date',
			'nettrine.migrations.versionCommand' => 'migrations:version',
		],
		'nettrine.subscriber' => ['08' => true],
		'nette.inject' => [
			'application.1' => true,
			'application.10' => true,
			'application.2' => true,
			'application.3' => true,
			'application.4' => true,
			'application.5' => true,
			'application.6' => true,
			'application.7' => true,
			'application.8' => true,
			'application.9' => true,
			'nettrine.fixtures.loadDataFixturesCommand' => true,
		],
		'nettrine.orm.annotation.driver' => ['nettrine.orm.annotations.annotationDriver' => true],
		'nettrine.orm.mapping.driver' => ['nettrine.orm.mappingDriver' => true],
	];

	protected $types = ['container' => 'Nette\DI\Container'];

	protected $aliases = [
		'application' => 'application.application',
		'cacheStorage' => 'cache.storage',
		'httpRequest' => 'http.request',
		'httpResponse' => 'http.response',
		'nette.httpRequestFactory' => 'http.requestFactory',
		'nette.latteFactory' => 'latte.latteFactory',
		'nette.mailer' => 'mail.mailer',
		'nette.presenterFactory' => 'application.presenterFactory',
		'nette.templateFactory' => 'latte.templateFactory',
		'nette.userStorage' => 'security.userStorage',
		'session' => 'session.session',
		'user' => 'security.user',
	];

	protected $wiring = [
		'Nette\DI\Container' => [['container']],
		'Nette\Application\Application' => [['application.application']],
		'Nette\Application\IPresenterFactory' => [['application.presenterFactory']],
		'Nette\Application\LinkGenerator' => [['application.linkGenerator']],
		'Nette\Caching\Storage' => [['cache.storage']],
		'Nette\Http\RequestFactory' => [['http.requestFactory']],
		'Nette\Http\IRequest' => [['http.request']],
		'Nette\Http\Request' => [['http.request']],
		'Nette\Http\IResponse' => [['http.response']],
		'Nette\Http\Response' => [['http.response']],
		'Nette\Bridges\ApplicationLatte\LatteFactory' => [['latte.latteFactory']],
		'Nette\Bridges\ApplicationLatte\TemplateFactory' => [['latte.templateFactory']],
		'Nette\Application\UI\TemplateFactory' => [['latte.templateFactory']],
		'App\Model\Latte\TemplateFactory' => [['latte.templateFactory']],
		'Nette\Mail\Mailer' => [['mail.mailer']],
		'Nette\Security\Passwords' => [['security.passwords', 'securitFy.passwords']],
		'Nette\Security\UserStorage' => [['security.userStorage']],
		'Nette\Security\IUserStorage' => [['security.legacyUserStorage']],
		'Nette\Security\User' => [['security.user']],
		'App\Model\Security\SecurityUser' => [['security.user']],
		'Nette\Http\Session' => [['session.session']],
		'Tracy\ILogger' => [
			0 => ['contributte.monolog.psrToTracyLazyAdapter'],
			2 => ['tracy.logger', 'contributte.monolog.psrToTracyAdapter'],
		],
		'Tracy\BlueScreen' => [['tracy.blueScreen']],
		'Tracy\Bar' => [['tracy.bar']],
		'Symfony\Contracts\EventDispatcher\EventDispatcherInterface' => [['contributte.events.dispatcher']],
		'Psr\EventDispatcher\EventDispatcherInterface' => [['contributte.events.dispatcher']],
		'Symfony\Component\EventDispatcher\EventDispatcherInterface' => [['contributte.events.dispatcher']],
		'Monolog\Handler\StreamHandler' => [2 => ['contributte.monolog.logger.default.handler.0']],
		'Monolog\Handler\AbstractProcessingHandler' => [2 => ['contributte.monolog.logger.default.handler.0']],
		'Monolog\Handler\AbstractHandler' => [2 => ['contributte.monolog.logger.default.handler.0']],
		'Monolog\Handler\Handler' => [2 => ['contributte.monolog.logger.default.handler.0']],
		'Monolog\Handler\HandlerInterface' => [2 => ['contributte.monolog.logger.default.handler.0']],
		'Monolog\ResettableInterface' => [
			0 => ['contributte.monolog.logger.default'],
			2 => ['contributte.monolog.logger.default.handler.0'],
		],
		'Monolog\Handler\ProcessableHandlerInterface' => [2 => ['contributte.monolog.logger.default.handler.0']],
		'Monolog\Handler\FormattableHandlerInterface' => [2 => ['contributte.monolog.logger.default.handler.0']],
		'Monolog\Handler\RotatingFileHandler' => [2 => ['contributte.monolog.logger.default.handler.0']],
		'Monolog\Processor\ProcessorInterface' => [
			2 => [
				'contributte.monolog.logger.default.processor.0',
				'contributte.monolog.logger.default.processor.1',
				'contributte.monolog.logger.default.processor.2',
				'contributte.monolog.logger.default.processor.3',
			],
		],
		'Monolog\Processor\WebProcessor' => [2 => ['contributte.monolog.logger.default.processor.0']],
		'Monolog\Processor\IntrospectionProcessor' => [2 => ['contributte.monolog.logger.default.processor.1']],
		'Monolog\Processor\MemoryProcessor' => [2 => ['contributte.monolog.logger.default.processor.2']],
		'Monolog\Processor\MemoryPeakUsageProcessor' => [2 => ['contributte.monolog.logger.default.processor.2']],
		'Monolog\Processor\ProcessIdProcessor' => [2 => ['contributte.monolog.logger.default.processor.3']],
		'Psr\Log\LoggerInterface' => [['contributte.monolog.logger.default']],
		'Monolog\Logger' => [['contributte.monolog.logger.default']],
		'Tracy\Bridges\Psr\PsrToTracyLoggerAdapter' => [2 => ['contributte.monolog.psrToTracyAdapter']],
		'Contributte\Monolog\Tracy\LazyTracyLogger' => [['contributte.monolog.psrToTracyLazyAdapter']],
		'Contributte\Mailing\IMailBuilderFactory' => [['contributte.mailing.builderFactory']],
		'Contributte\Mailing\IMailSender' => [['contributte.mailing.sender']],
		'Contributte\Mailing\IMailTemplateFactory' => [['contributte.mailing.templateFactory']],
		'Contributte\Mail\Message\IMessageFactory' => [['contributte.post.messageFactory']],
		'Contributte\Translation\LocaleResolver' => [['contributte.translation.localeResolver']],
		'Contributte\Translation\LocalesResolvers\ResolverInterface' => [
			[
				'contributte.translation.localeResolverSession',
				'contributte.translation.localeResolverRouter',
				'contributte.translation.localeResolverParameter',
				'contributte.translation.localeResolverHeader',
			],
		],
		'Contributte\Translation\LocalesResolvers\Session' => [['contributte.translation.localeResolverSession']],
		'Contributte\Translation\LocalesResolvers\Router' => [['contributte.translation.localeResolverRouter']],
		'Contributte\Translation\LocalesResolvers\Parameter' => [['contributte.translation.localeResolverParameter']],
		'Contributte\Translation\LocalesResolvers\Header' => [['contributte.translation.localeResolverHeader']],
		'Contributte\Translation\FallbackResolver' => [['contributte.translation.fallbackResolver']],
		'Symfony\Component\Config\ConfigCacheFactoryInterface' => [['contributte.translation.configCacheFactory']],
		'Symfony\Component\Config\ConfigCacheFactory' => [['contributte.translation.configCacheFactory']],
		'Symfony\Component\Translation\Translator' => [['contributte.translation.translator']],
		'Symfony\Contracts\Translation\TranslatorInterface' => [['contributte.translation.translator']],
		'Symfony\Component\Translation\TranslatorBagInterface' => [1 => ['contributte.translation.translator']],
		'Symfony\Contracts\Translation\LocaleAwareInterface' => [1 => ['contributte.translation.translator']],
		'Nette\Localization\Translator' => [['contributte.translation.translator']],
		'Contributte\Translation\Translator' => [['contributte.translation.translator']],
		'Symfony\Component\Translation\Loader\ArrayLoader' => [['contributte.translation.loaderNeon']],
		'Symfony\Component\Translation\Loader\LoaderInterface' => [['contributte.translation.loaderNeon']],
		'Contributte\Translation\Loaders\Neon' => [['contributte.translation.loaderNeon']],
		'Tracy\IBarPanel' => [['contributte.translation.tracyPanel']],
		'Contributte\Translation\Tracy\Panel' => [['contributte.translation.tracyPanel']],
		'Doctrine\Common\Annotations\Reader' => [
			0 => ['nettrine.annotations.reader'],
			2 => ['nettrine.annotations.delegatedReader'],
		],
		'Doctrine\Common\Annotations\AnnotationReader' => [2 => ['nettrine.annotations.delegatedReader']],
		'Doctrine\Common\Cache\Cache' => [['nettrine.cache.driver']],
		'Doctrine\Migrations\Metadata\Storage\MetadataStorageConfiguration' => [
			['nettrine.migrations.configuration.tableStorage'],
		],
		'Doctrine\Migrations\Metadata\Storage\TableMetadataStorageConfiguration' => [
			['nettrine.migrations.configuration.tableStorage'],
		],
		'Doctrine\Migrations\Configuration\Configuration' => [['nettrine.migrations.configuration']],
		'Doctrine\Migrations\Version\MigrationFactory' => [['nettrine.migrations.migrationFactory']],
		'Nettrine\Migrations\Version\DbalMigrationFactory' => [['nettrine.migrations.migrationFactory']],
		'Nettrine\Migrations\DI\DependencyFactory' => [2 => ['nettrine.migrations.nettrineDependencyFactory']],
		'Doctrine\Migrations\DependencyFactory' => [['nettrine.migrations.dependencyFactory']],
		'Doctrine\Migrations\Tools\Console\Command\DoctrineCommand' => [
			2 => [
				'nettrine.migrations.currentCommand',
				'nettrine.migrations.diffCommand',
				'nettrine.migrations.dumpSchemaCommand',
				'nettrine.migrations.executeCommand',
				'nettrine.migrations.generateCommand',
				'nettrine.migrations.latestCommand',
				'nettrine.migrations.listCommand',
				'nettrine.migrations.migrateCommand',
				'nettrine.migrations.rollupCommand',
				'nettrine.migrations.statusCommand',
				'nettrine.migrations.syncMetadataCommand',
				'nettrine.migrations.upToDateCommand',
				'nettrine.migrations.versionCommand',
			],
		],
		'Symfony\Component\Console\Command\Command' => [
			0 => ['nettrine.fixtures.loadDataFixturesCommand', '06'],
			2 => [
				'nettrine.migrations.currentCommand',
				'nettrine.migrations.diffCommand',
				'nettrine.migrations.dumpSchemaCommand',
				'nettrine.migrations.executeCommand',
				'nettrine.migrations.generateCommand',
				'nettrine.migrations.latestCommand',
				'nettrine.migrations.listCommand',
				'nettrine.migrations.migrateCommand',
				'nettrine.migrations.rollupCommand',
				'nettrine.migrations.statusCommand',
				'nettrine.migrations.syncMetadataCommand',
				'nettrine.migrations.upToDateCommand',
				'nettrine.migrations.versionCommand',
			],
		],
		'Doctrine\Migrations\Tools\Console\Command\CurrentCommand' => [2 => ['nettrine.migrations.currentCommand']],
		'Doctrine\Migrations\Tools\Console\Command\DiffCommand' => [2 => ['nettrine.migrations.diffCommand']],
		'Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand' => [2 => ['nettrine.migrations.dumpSchemaCommand']],
		'Doctrine\Migrations\Tools\Console\Command\ExecuteCommand' => [2 => ['nettrine.migrations.executeCommand']],
		'Doctrine\Migrations\Tools\Console\Command\GenerateCommand' => [2 => ['nettrine.migrations.generateCommand']],
		'Doctrine\Migrations\Tools\Console\Command\LatestCommand' => [2 => ['nettrine.migrations.latestCommand']],
		'Doctrine\Migrations\Tools\Console\Command\ListCommand' => [2 => ['nettrine.migrations.listCommand']],
		'Doctrine\Migrations\Tools\Console\Command\MigrateCommand' => [2 => ['nettrine.migrations.migrateCommand']],
		'Doctrine\Migrations\Tools\Console\Command\RollupCommand' => [2 => ['nettrine.migrations.rollupCommand']],
		'Doctrine\Migrations\Tools\Console\Command\StatusCommand' => [2 => ['nettrine.migrations.statusCommand']],
		'Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand' => [
			2 => ['nettrine.migrations.syncMetadataCommand'],
		],
		'Doctrine\Migrations\Tools\Console\Command\UpToDateCommand' => [2 => ['nettrine.migrations.upToDateCommand']],
		'Doctrine\Migrations\Tools\Console\Command\VersionCommand' => [2 => ['nettrine.migrations.versionCommand']],
		'Doctrine\Common\DataFixtures\Loader' => [['nettrine.fixtures.fixturesLoader']],
		'Nettrine\Fixtures\Loader\FixturesLoader' => [['nettrine.fixtures.fixturesLoader']],
		'Nettrine\Fixtures\Command\LoadDataFixturesCommand' => [['nettrine.fixtures.loadDataFixturesCommand']],
		'Doctrine\DBAL\Logging\SQLLogger' => [
			['nettrine.dbal.profiler'],
			['nettrine.dbal.logger'],
			['nettrine.dbal.logger.config'],
		],
		'Nettrine\DBAL\Logger\PsrLogger' => [2 => ['nettrine.dbal.logger.config']],
		'Nettrine\DBAL\Logger\AbstractLogger' => [['nettrine.dbal.profiler']],
		'Nettrine\DBAL\Logger\ProfilerLogger' => [['nettrine.dbal.profiler']],
		'Doctrine\DBAL\Logging\LoggerChain' => [['nettrine.dbal.logger']],
		'Doctrine\DBAL\Configuration' => [0 => ['nettrine.orm.configuration'], 2 => ['nettrine.dbal.configuration']],
		'Doctrine\Common\EventManager' => [0 => ['nettrine.dbal.eventManager.debug'], 2 => ['nettrine.dbal.eventManager']],
		'Nettrine\DBAL\Events\ContainerAwareEventManager' => [2 => ['nettrine.dbal.eventManager']],
		'Nettrine\DBAL\Events\DebugEventManager' => [['nettrine.dbal.eventManager.debug']],
		'Nettrine\DBAL\ConnectionFactory' => [['nettrine.dbal.connectionFactory']],
		'Doctrine\DBAL\Connection' => [['nettrine.dbal.connection']],
		'Nettrine\DBAL\ConnectionAccessor' => [['nettrine.dbal.connectionAccessor']],
		'Doctrine\ORM\Configuration' => [['nettrine.orm.configuration']],
		'Doctrine\ORM\Mapping\EntityListenerResolver' => [['nettrine.orm.entityListenerResolver']],
		'Nettrine\ORM\Mapping\ContainerEntityListenerResolver' => [['nettrine.orm.entityListenerResolver']],
		'Nettrine\ORM\EntityManagerDecorator' => [['nettrine.orm.entityManagerDecorator']],
		'Doctrine\ORM\Decorator\EntityManagerDecorator' => [['nettrine.orm.entityManagerDecorator']],
		'Doctrine\Persistence\ObjectManagerDecorator' => [['nettrine.orm.entityManagerDecorator']],
		'Doctrine\Persistence\ObjectManager' => [['nettrine.orm.entityManagerDecorator']],
		'Doctrine\ORM\EntityManagerInterface' => [['nettrine.orm.entityManagerDecorator']],
		'App\Model\Database\EntityManager' => [['nettrine.orm.entityManagerDecorator']],
		'Doctrine\Persistence\AbstractManagerRegistry' => [['nettrine.orm.managerRegistry']],
		'Doctrine\Persistence\ConnectionRegistry' => [['nettrine.orm.managerRegistry']],
		'Doctrine\Persistence\ManagerRegistry' => [['nettrine.orm.managerRegistry']],
		'Nettrine\ORM\ManagerRegistry' => [['nettrine.orm.managerRegistry']],
		'Doctrine\Persistence\Mapping\Driver\MappingDriver' => [
			0 => ['nettrine.orm.mappingDriver'],
			2 => [1 => 'nettrine.orm.annotations.annotationDriver'],
		],
		'Doctrine\Persistence\Mapping\Driver\MappingDriverChain' => [['nettrine.orm.mappingDriver']],
		'Doctrine\ORM\Cache\RegionsConfiguration' => [2 => ['nettrine.orm.cache.regions']],
		'Doctrine\ORM\Cache\CacheFactory' => [2 => ['nettrine.orm.cache.cacheFactory']],
		'Doctrine\ORM\Cache\DefaultCacheFactory' => [2 => ['nettrine.orm.cache.cacheFactory']],
		'Doctrine\ORM\Cache\CacheConfiguration' => [2 => ['nettrine.orm.cache.cacheConfiguration']],
		'Doctrine\ORM\Mapping\Driver\CompatibilityAnnotationDriver' => [2 => ['nettrine.orm.annotations.annotationDriver']],
		'Doctrine\ORM\Mapping\Driver\AnnotationDriver' => [2 => ['nettrine.orm.annotations.annotationDriver']],
		'App\UI\Form\FormFactory' => [['01']],
		'App\UI\Components\Sign\SignInFormFactory' => [['02']],
		'App\UI\Components\User\UserGridFactory' => [['03']],
		'App\Model\Security\Passwords' => [['securitFy.passwords']],
		'Nette\Security\Authenticator' => [['security.authenticator']],
		'Nette\Security\IAuthenticator' => [['security.authenticator']],
		'App\Model\Security\Authenticator\UserAuthenticator' => [['security.authenticator']],
		'Nette\Security\Permission' => [['security.authorizator']],
		'Nette\Security\Authorizator' => [['security.authorizator']],
		'App\Model\Security\Authorizator\StaticAuthorizator' => [['security.authorizator']],
		'App\Model\Router\RouterFactory' => [['04']],
		'Nette\Routing\Router' => [['router']],
		'App\Domain\User\CreateUserFacade' => [['05']],
		'App\Model\Console\HelloCommand' => [['06']],
		'Nette\Application\Response' => [['07']],
		'Stringable' => [['07']],
		'Contributte\PdfResponse\PdfResponse' => [['07']],
		'Doctrine\Common\EventSubscriber' => [['08']],
		'Nettrine\Migrations\Subscriber\FixPostgreSQLDefaultSchemaSubscriber' => [['08']],
		'Nette\Application\UI\Presenter' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'Nette\Application\UI\Control' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'Nette\Application\UI\Component' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'Nette\ComponentModel\Container' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'Nette\ComponentModel\Component' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'Nette\Application\IPresenter' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
				'application.9',
				'application.10',
			],
		],
		'Nette\Application\UI\Renderable' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'ArrayAccess' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'Nette\Application\UI\StatePersistent' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'Nette\Application\UI\SignalReceiver' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'Nette\ComponentModel\IContainer' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'Nette\ComponentModel\IComponent' => [
			2 => [
				'application.1',
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'App\Modules\Mailing\Home\HomePresenter' => [2 => ['application.1']],
		'App\Modules\Base\BaseErrorPresenter' => [2 => ['application.2']],
		'App\Modules\Base\SecuredPresenter' => [
			2 => ['application.2', 'application.4', 'application.6', 'application.7', 'application.8'],
		],
		'App\Modules\Base\BasePresenter' => [
			2 => [
				'application.2',
				'application.3',
				'application.4',
				'application.5',
				'application.6',
				'application.7',
				'application.8',
			],
		],
		'App\Modules\Front\Error\ErrorPresenter' => [2 => ['application.2']],
		'App\Modules\Front\BaseFrontPresenter' => [2 => ['application.3']],
		'App\Modules\Base\UnsecuredPresenter' => [2 => ['application.3']],
		'App\Modules\Front\Home\HomePresenter' => [2 => ['application.3']],
		'App\Modules\Base\BaseError4xxPresenter' => [2 => ['application.4']],
		'App\Modules\Front\Error4xx\Error4xxPresenter' => [2 => ['application.4']],
		'App\Modules\Pdf\Home\HomePresenter' => [2 => ['application.5']],
		'App\Modules\Admin\BaseAdminPresenter' => [2 => ['application.6', 'application.7', 'application.8']],
		'App\Modules\Admin\Sign\SignPresenter' => [2 => ['application.6']],
		'App\Modules\Admin\User\UserPresenter' => [2 => ['application.7']],
		'App\Modules\Admin\Home\HomePresenter' => [2 => ['application.8']],
		'NetteModule\ErrorPresenter' => [2 => ['application.9']],
		'NetteModule\MicroPresenter' => [2 => ['application.10']],
		'Contributte\Translation\Latte\Filters' => [['contributte.translation.latte.filters']],
	];


	public function __construct(array $params = [])
	{
		parent::__construct($params);
		$this->parameters += [
			'system' => ['error' => ['email' => 'dev@dev.dev', 'presenter' => 'Front:Error']],
			'database' => [
				'driver' => 'pdo_mysql',
				'port' => 3306,
				'user' => 'pia',
				'password' => 'm3nQJoLBz4mOxJM4vvPX',
				'host' => 'db.hintik.cz',
				'dbname' => 'PIA-SP',
			],
			'project' => ['rev' => '1.0.0'],
			'files' => ['root' => '/__app__/app/../data/files'],
			'mailing' => ['from' => 'webapp@localhost', 'from_name' => 'Webapp'],
			'smtp' => ['host' => 'localhost', 'username' => 'fake', 'password' => 'fake'],
			'appDir' => '/__app__/app',
			'wwwDir' => '/__app__/www',
			'debugMode' => true,
			'productionMode' => false,
			'consoleMode' => false,
			'tempDir' => '/__app__/app/../var/tmp',
			'rootDir' => '/__app__',
		];
	}


	public function createService01(): App\UI\Form\FormFactory
	{
		return new App\UI\Form\FormFactory;
	}


	public function createService02(): App\UI\Components\Sign\SignInFormFactory
	{
		return new App\UI\Components\Sign\SignInFormFactory($this->getService('security.user'));
	}


	public function createService03(): App\UI\Components\User\UserGridFactory
	{
		return new App\UI\Components\User\UserGridFactory($this->getService('nettrine.orm.entityManagerDecorator'));
	}


	public function createService04(): App\Model\Router\RouterFactory
	{
		return new App\Model\Router\RouterFactory;
	}


	public function createService05(): App\Domain\User\CreateUserFacade
	{
		return new App\Domain\User\CreateUserFacade($this->getService('nettrine.orm.entityManagerDecorator'));
	}


	public function createService06(): App\Model\Console\HelloCommand
	{
		return new App\Model\Console\HelloCommand;
	}


	public function createService07(): Contributte\PdfResponse\PdfResponse
	{
		$service = new Contributte\PdfResponse\PdfResponse;
		$service->mpdfConfig = ['tempDir' => '/__app__/app/../var/tmp/mpdf'];
		return $service;
	}


	public function createService08(): Nettrine\Migrations\Subscriber\FixPostgreSQLDefaultSchemaSubscriber
	{
		return new Nettrine\Migrations\Subscriber\FixPostgreSQLDefaultSchemaSubscriber;
	}


	public function createServiceApplication__1(): App\Modules\Mailing\Home\HomePresenter
	{
		$service = new App\Modules\Mailing\Home\HomePresenter($this->getService('contributte.mailing.builderFactory'));
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__10(): NetteModule\MicroPresenter
	{
		return new NetteModule\MicroPresenter($this, $this->getService('http.request'), $this->getService('router'));
	}


	public function createServiceApplication__2(): App\Modules\Front\Error\ErrorPresenter
	{
		$service = new App\Modules\Front\Error\ErrorPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->translatorSessionResolver = $this->getService('contributte.translation.localeResolverSession');
		$service->translator = $this->getService('contributte.translation.translator');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__3(): App\Modules\Front\Home\HomePresenter
	{
		$service = new App\Modules\Front\Home\HomePresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->translatorSessionResolver = $this->getService('contributte.translation.localeResolverSession');
		$service->translator = $this->getService('contributte.translation.translator');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__4(): App\Modules\Front\Error4xx\Error4xxPresenter
	{
		$service = new App\Modules\Front\Error4xx\Error4xxPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->translatorSessionResolver = $this->getService('contributte.translation.localeResolverSession');
		$service->translator = $this->getService('contributte.translation.translator');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__5(): App\Modules\Pdf\Home\HomePresenter
	{
		$service = new App\Modules\Pdf\Home\HomePresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->translatorSessionResolver = $this->getService('contributte.translation.localeResolverSession');
		$service->translator = $this->getService('contributte.translation.translator');
		$service->pdfResponse = $this->getService('07');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__6(): App\Modules\Admin\Sign\SignPresenter
	{
		$service = new App\Modules\Admin\Sign\SignPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->translatorSessionResolver = $this->getService('contributte.translation.localeResolverSession');
		$service->translator = $this->getService('contributte.translation.translator');
		$service->signInFormFactory = $this->getService('02');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__7(): App\Modules\Admin\User\UserPresenter
	{
		$service = new App\Modules\Admin\User\UserPresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->userGridFactory = $this->getService('03');
		$service->translatorSessionResolver = $this->getService('contributte.translation.localeResolverSession');
		$service->translator = $this->getService('contributte.translation.translator');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__8(): App\Modules\Admin\Home\HomePresenter
	{
		$service = new App\Modules\Admin\Home\HomePresenter;
		$service->injectPrimary(
			$this,
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
			$this->getService('session.session'),
			$this->getService('security.user'),
			$this->getService('latte.templateFactory'),
		);
		$service->translatorSessionResolver = $this->getService('contributte.translation.localeResolverSession');
		$service->translator = $this->getService('contributte.translation.translator');
		$service->dispatcher = $this->getService('contributte.events.dispatcher');
		$service->invalidLinkMode = 5;
		return $service;
	}


	public function createServiceApplication__9(): NetteModule\ErrorPresenter
	{
		return new NetteModule\ErrorPresenter($this->getService('contributte.monolog.psrToTracyLazyAdapter'));
	}


	public function createServiceApplication__application(): Nette\Application\Application
	{
		$service = new Nette\Application\Application(
			$this->getService('application.presenterFactory'),
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('http.response'),
		);
		$service->catchExceptions = false;
		$service->errorPresenter = 'Front:Error';
		Nette\Bridges\ApplicationDI\ApplicationExtension::initializeBlueScreenPanel(
			$this->getService('tracy.blueScreen'),
			$service,
		);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\ApplicationTracy\RoutingPanel(
			$this->getService('router'),
			$this->getService('http.request'),
			$this->getService('application.presenterFactory'),
		));
		$service->onStartup[] = function() {$this->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Application\StartupEvent(...func_get_args()));};
		$service->onError[] = function() {$this->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Application\ErrorEvent(...func_get_args()));};
		$service->onPresenter[] = function() {$this->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Application\PresenterEvent(...func_get_args()));};
		$service->onPresenter[] = function($application, $presenter) {if(!$presenter instanceof Nette\Application\UI\Presenter){return;} $presenter->onStartup[] = function() {$this->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Application\PresenterStartupEvent(...func_get_args()));};};
		$service->onPresenter[] = function($application, $presenter) {if(!$presenter instanceof Nette\Application\UI\Presenter){return;} $presenter->onShutdown[] = function() {$this->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Application\PresenterShutdownEvent(...func_get_args()));};};
		$service->onRequest[] = function() {$this->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Application\RequestEvent(...func_get_args()));};
		$service->onResponse[] = function() {$this->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Application\ResponseEvent(...func_get_args()));};
		$service->onShutdown[] = function() {$this->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Application\ShutdownEvent(...func_get_args()));};
		return $service;
	}


	public function createServiceApplication__linkGenerator(): Nette\Application\LinkGenerator
	{
		return new Nette\Application\LinkGenerator(
			$this->getService('router'),
			$this->getService('http.request')->getUrl()->withoutUserInfo(),
			$this->getService('application.presenterFactory'),
		);
	}


	public function createServiceApplication__presenterFactory(): Nette\Application\IPresenterFactory
	{
		$service = new Nette\Application\PresenterFactory(new Nette\Bridges\ApplicationDI\PresenterFactoryCallback(
			$this,
			5,
			'/__app__/app/../var/tmp/cache/nette.application/touch',
		));
		$service->setMapping([
			'Admin' => ['App\Modules\Admin', '*', '*\*Presenter'],
			'Front' => ['App\Modules\Front', '*', '*\*Presenter'],
			'Mailing' => ['App\Modules\Mailing', '*', '*\*Presenter'],
			'Pdf' => ['App\Modules\Pdf', '*', '*\*Presenter'],
		]);
		return $service;
	}


	public function createServiceCache__storage(): Nette\Caching\Storage
	{
		return new Nette\Caching\Storages\FileStorage('/__app__/app/../var/tmp/cache');
	}


	public function createServiceContainer(): Container_6a10a49a37
	{
		return $this;
	}


	public function createServiceContributte__events__dispatcher(): Symfony\Component\EventDispatcher\EventDispatcherInterface
	{
		return new Contributte\EventDispatcher\LazyEventDispatcher($this);
	}


	public function createServiceContributte__mailing__builderFactory(): Contributte\Mailing\IMailBuilderFactory
	{
		return new Contributte\Mailing\MailBuilderFactory(
			$this->getService('contributte.mailing.sender'),
			$this->getService('contributte.mailing.templateFactory'),
		);
	}


	public function createServiceContributte__mailing__sender(): Contributte\Mailing\IMailSender
	{
		return new Contributte\Mailing\NetteMailSender($this->getService('mail.mailer'));
	}


	public function createServiceContributte__mailing__templateFactory(): Contributte\Mailing\IMailTemplateFactory
	{
		$service = new Contributte\Mailing\NetteTemplateFactory(
			$this->getService('latte.templateFactory'),
			$this->getService('application.linkGenerator'),
		);
		$service->setDefaults(['layout' => '@default']);
		$service->setConfig(['layout' => '/__app__/app/resources/mail/@layout.latte']);
		return $service;
	}


	public function createServiceContributte__monolog__logger__default(): Monolog\Logger
	{
		return new Monolog\Logger(
			'default',
			[$this->getService('contributte.monolog.logger.default.handler.0')],
			[
				$this->getService('contributte.monolog.logger.default.processor.0'),
				$this->getService('contributte.monolog.logger.default.processor.1'),
				$this->getService('contributte.monolog.logger.default.processor.2'),
				$this->getService('contributte.monolog.logger.default.processor.3'),
			],
		);
	}


	public function createServiceContributte__monolog__logger__default__handler__0(): Monolog\Handler\RotatingFileHandler
	{
		return new Monolog\Handler\RotatingFileHandler('/__app__/app/../log/syslog.log', 30, 300);
	}


	public function createServiceContributte__monolog__logger__default__processor__0(): Monolog\Processor\WebProcessor
	{
		return new Monolog\Processor\WebProcessor;
	}


	public function createServiceContributte__monolog__logger__default__processor__1(): Monolog\Processor\IntrospectionProcessor
	{
		return new Monolog\Processor\IntrospectionProcessor;
	}


	public function createServiceContributte__monolog__logger__default__processor__2(): Monolog\Processor\MemoryPeakUsageProcessor
	{
		return new Monolog\Processor\MemoryPeakUsageProcessor;
	}


	public function createServiceContributte__monolog__logger__default__processor__3(): Monolog\Processor\ProcessIdProcessor
	{
		return new Monolog\Processor\ProcessIdProcessor;
	}


	public function createServiceContributte__monolog__psrToTracyAdapter(): Tracy\Bridges\Psr\PsrToTracyLoggerAdapter
	{
		return new Tracy\Bridges\Psr\PsrToTracyLoggerAdapter($this->getService('contributte.monolog.logger.default'));
	}


	public function createServiceContributte__monolog__psrToTracyLazyAdapter(): Contributte\Monolog\Tracy\LazyTracyLogger
	{
		return new Contributte\Monolog\Tracy\LazyTracyLogger('contributte.monolog.psrToTracyAdapter', $this);
	}


	public function createServiceContributte__post__messageFactory(): Contributte\Mail\Message\IMessageFactory
	{
		return new class ($this) implements Contributte\Mail\Message\IMessageFactory {
			private $container;


			public function __construct(Container_6a10a49a37 $container)
			{
				$this->container = $container;
			}


			public function create(): Nette\Mail\Message
			{
				return new Nette\Mail\Message;
			}
		};
	}


	public function createServiceContributte__translation__configCacheFactory(): Symfony\Component\Config\ConfigCacheFactory
	{
		return new Symfony\Component\Config\ConfigCacheFactory(true);
	}


	public function createServiceContributte__translation__fallbackResolver(): Contributte\Translation\FallbackResolver
	{
		return new Contributte\Translation\FallbackResolver;
	}


	public function createServiceContributte__translation__latte__filters(): Contributte\Translation\Latte\Filters
	{
		return new Contributte\Translation\Latte\Filters($this->getService('contributte.translation.translator'));
	}


	public function createServiceContributte__translation__loaderNeon(): Contributte\Translation\Loaders\Neon
	{
		return new Contributte\Translation\Loaders\Neon;
	}


	public function createServiceContributte__translation__localeResolver(): Contributte\Translation\LocaleResolver
	{
		$service = new Contributte\Translation\LocaleResolver($this);
		$service->addResolver('Contributte\Translation\LocalesResolvers\Session');
		$service->addResolver('Contributte\Translation\LocalesResolvers\Router');
		$service->addResolver('Contributte\Translation\LocalesResolvers\Parameter');
		$service->addResolver('Contributte\Translation\LocalesResolvers\Header');
		return $service;
	}


	public function createServiceContributte__translation__localeResolverHeader(): Contributte\Translation\LocalesResolvers\Header
	{
		return new Contributte\Translation\LocalesResolvers\Header($this->getService('http.request'));
	}


	public function createServiceContributte__translation__localeResolverParameter(): Contributte\Translation\LocalesResolvers\Parameter
	{
		return new Contributte\Translation\LocalesResolvers\Parameter($this->getService('http.request'));
	}


	public function createServiceContributte__translation__localeResolverRouter(): Contributte\Translation\LocalesResolvers\Router
	{
		return new Contributte\Translation\LocalesResolvers\Router($this->getService('http.request'), $this->getService('router'));
	}


	public function createServiceContributte__translation__localeResolverSession(): Contributte\Translation\LocalesResolvers\Session
	{
		return new Contributte\Translation\LocalesResolvers\Session(
			$this->getService('http.response'),
			$this->getService('session.session'),
		);
	}


	public function createServiceContributte__translation__tracyPanel(): Contributte\Translation\Tracy\Panel
	{
		$service = new Contributte\Translation\Tracy\Panel($this->getService('contributte.translation.translator'));
		$service->addLocaleResolver($this->getService('contributte.translation.localeResolverSession'));
		$service->addLocaleResolver($this->getService('contributte.translation.localeResolverRouter'));
		$service->addLocaleResolver($this->getService('contributte.translation.localeResolverParameter'));
		$service->addLocaleResolver($this->getService('contributte.translation.localeResolverHeader'));
		$service->addResource('/__app__/app/lang/admin.cs.neon', 'cs', 'admin');
		$service->addResource('/__app__/app/lang/admin.en.neon', 'en', 'admin');
		return $service;
	}


	public function createServiceContributte__translation__translator(): Contributte\Translation\Translator
	{
		$service = new Contributte\Translation\Translator(
			$this->getService('contributte.translation.localeResolver'),
			$this->getService('contributte.translation.fallbackResolver'),
			'cs',
			'/__app__/app/../var/tmp/cache/translation',
			true,
			[],
		);
		$service->setLocalesWhitelist(['en', 'cs']);
		$service->setConfigCacheFactory($this->getService('contributte.translation.configCacheFactory'));
		$service->setFallbackLocales(['cs']);
		$service->returnOriginalMessage = true;
		$service->addLoader('neon', $this->getService('contributte.translation.loaderNeon'));
		$service->addResource('neon', '/__app__/app/lang/admin.cs.neon', 'cs', 'admin');
		$service->addResource('neon', '/__app__/app/lang/admin.en.neon', 'en', 'admin');
		return $service;
	}


	public function createServiceHttp__request(): Nette\Http\Request
	{
		return $this->getService('http.requestFactory')->fromGlobals();
	}


	public function createServiceHttp__requestFactory(): Nette\Http\RequestFactory
	{
		$service = new Nette\Http\RequestFactory;
		$service->setProxy([]);
		return $service;
	}


	public function createServiceHttp__response(): Nette\Http\Response
	{
		$service = new Nette\Http\Response;
		$service->cookieSecure = $this->getService('http.request')->isSecured();
		return $service;
	}


	public function createServiceLatte__latteFactory(): Nette\Bridges\ApplicationLatte\LatteFactory
	{
		return new class ($this) implements Nette\Bridges\ApplicationLatte\LatteFactory {
			private $container;


			public function __construct(Container_6a10a49a37 $container)
			{
				$this->container = $container;
			}


			public function create(): Latte\Engine
			{
				$service = new Latte\Engine;
				$service->setTempDirectory('/__app__/app/../var/tmp/cache/latte');
				$service->setAutoRefresh(true);
				$service->setContentType('html');
				Nette\Utils\Html::$xhtml = false;
				$service->onCompile[] = function ($engine) { App\Model\Latte\Macros::register($engine->getCompiler()); };
				$service->addFilter('datetime', 'App\Model\Latte\Filters::datetime');
				$service->addFilter('neon', 'App\Model\Latte\Filters::neon');
				$service->addFilter('json', 'App\Model\Latte\Filters::json');
				$service->onCompile[] = function() {$this->container->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Latte\LatteCompileEvent(...func_get_args()));};
				$service->onCompile[] = function (Latte\Engine $engine): void { Contributte\Translation\Latte\Macros::install($engine->getCompiler()); };
				$service->addProvider('translator', $this->container->getService('contributte.translation.translator'));
				$service->addFilter('translate', [$this->container->getService('contributte.translation.latte.filters'), 'translate']);
				return $service;
			}
		};
	}


	public function createServiceLatte__templateFactory(): App\Model\Latte\TemplateFactory
	{
		$service = new App\Model\Latte\TemplateFactory(
			$this->getService('latte.latteFactory'),
			$this->getService('http.request'),
			$this->getService('security.user'),
			$this->getService('cache.storage'),
		);
		Nette\Bridges\ApplicationDI\LatteExtension::initLattePanel($service, $this->getService('tracy.bar'), false);
		return $service;
	}


	public function createServiceMail__mailer(): Nette\Mail\Mailer
	{
		return new Nette\Mail\SendmailMailer;
	}


	public function createServiceNettrine__annotations__delegatedReader(): Doctrine\Common\Annotations\AnnotationReader
	{
		$service = new Doctrine\Common\Annotations\AnnotationReader;
		$service->addGlobalIgnoredName('persistent');
		$service->addGlobalIgnoredName('serializationVersion');
		return $service;
	}


	public function createServiceNettrine__annotations__reader(): Doctrine\Common\Annotations\Reader
	{
		return new Doctrine\Common\Annotations\CachedReader(
			$this->getService('nettrine.annotations.delegatedReader'),
			$this->getService('nettrine.cache.driver'),
			false,
		);
	}


	public function createServiceNettrine__cache__driver(): Doctrine\Common\Cache\Cache
	{
		return new Doctrine\Common\Cache\PhpFileCache('/__app__/app/../var/tmp/cache/nettrine.cache');
	}


	public function createServiceNettrine__dbal__configuration(): Doctrine\DBAL\Configuration
	{
		$service = new Doctrine\DBAL\Configuration;
		$service->setSQLLogger($this->getService('nettrine.dbal.logger'));
		$service->setResultCacheImpl($this->getService('nettrine.cache.driver'));
		$service->setAutoCommit(true);
		return $service;
	}


	public function createServiceNettrine__dbal__connection(): Doctrine\DBAL\Connection
	{
		$service = $this->getService('nettrine.dbal.connectionFactory')->createConnection(
			[
				'driver' => 'pdo_mysql',
				'host' => 'db.hintik.cz',
				'user' => 'pia',
				'password' => 'm3nQJoLBz4mOxJM4vvPX',
				'dbname' => 'PIA-SP',
				'port' => 3306,
				'types' => [],
				'typesMapping' => [],
			],
			$this->getService('nettrine.dbal.configuration'),
			$this->getService('nettrine.dbal.eventManager.debug'),
		);
		$this->getService('tracy.bar')->addPanel(new Nettrine\DBAL\Tracy\QueryPanel\QueryPanel($this->getService('nettrine.dbal.profiler')));
		$this->getService('tracy.blueScreen')->addPanel(['Nettrine\DBAL\Tracy\BlueScreen\DbalBlueScreen', 'renderException']);
		return $service;
	}


	public function createServiceNettrine__dbal__connectionAccessor(): Nettrine\DBAL\ConnectionAccessor
	{
		return new class ($this) implements Nettrine\DBAL\ConnectionAccessor {
			private $container;


			public function __construct(Container_6a10a49a37 $container)
			{
				$this->container = $container;
			}


			public function get(): Doctrine\DBAL\Connection
			{
				return $this->container->getService('nettrine.dbal.connection');
			}
		};
	}


	public function createServiceNettrine__dbal__connectionFactory(): Nettrine\DBAL\ConnectionFactory
	{
		return new Nettrine\DBAL\ConnectionFactory([], []);
	}


	public function createServiceNettrine__dbal__eventManager(): Nettrine\DBAL\Events\ContainerAwareEventManager
	{
		$service = new Nettrine\DBAL\Events\ContainerAwareEventManager($this);
		$service->addEventListener(['postGenerateSchema'], '08');
		return $service;
	}


	public function createServiceNettrine__dbal__eventManager__debug(): Nettrine\DBAL\Events\DebugEventManager
	{
		return new Nettrine\DBAL\Events\DebugEventManager($this->getService('nettrine.dbal.eventManager'));
	}


	public function createServiceNettrine__dbal__logger(): Doctrine\DBAL\Logging\LoggerChain
	{
		return new Doctrine\DBAL\Logging\LoggerChain([
			$this->getService('nettrine.dbal.logger.config'),
			$this->getService('nettrine.dbal.profiler'),
		]);
	}


	public function createServiceNettrine__dbal__logger__config(): Nettrine\DBAL\Logger\PsrLogger
	{
		return new Nettrine\DBAL\Logger\PsrLogger($this->getService('contributte.monolog.logger.default'));
	}


	public function createServiceNettrine__dbal__profiler(): Nettrine\DBAL\Logger\ProfilerLogger
	{
		return new Nettrine\DBAL\Logger\ProfilerLogger($this->getService('nettrine.dbal.connectionAccessor'));
	}


	public function createServiceNettrine__fixtures__fixturesLoader(): Nettrine\Fixtures\Loader\FixturesLoader
	{
		return new Nettrine\Fixtures\Loader\FixturesLoader(['/__app__/db/Fixtures'], $this);
	}


	public function createServiceNettrine__fixtures__loadDataFixturesCommand(): Nettrine\Fixtures\Command\LoadDataFixturesCommand
	{
		return new Nettrine\Fixtures\Command\LoadDataFixturesCommand(
			$this->getService('nettrine.fixtures.fixturesLoader'),
			$this->getService('nettrine.orm.managerRegistry'),
		);
	}


	public function createServiceNettrine__migrations__configuration(): Doctrine\Migrations\Configuration\Configuration
	{
		$service = new Doctrine\Migrations\Configuration\Configuration;
		$service->setCustomTemplate(null);
		$service->setMetadataStorageConfiguration($this->getService('nettrine.migrations.configuration.tableStorage'));
		$service->addMigrationsDirectory('Database\Migrations', '/__app__/db/Migrations');
		return $service;
	}


	public function createServiceNettrine__migrations__configuration__tableStorage(): Doctrine\Migrations\Metadata\Storage\TableMetadataStorageConfiguration
	{
		$service = new Doctrine\Migrations\Metadata\Storage\TableMetadataStorageConfiguration;
		$service->setTableName('doctrine_migrations');
		$service->setVersionColumnName('version');
		return $service;
	}


	public function createServiceNettrine__migrations__currentCommand(): Doctrine\Migrations\Tools\Console\Command\CurrentCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\CurrentCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__dependencyFactory(): Doctrine\Migrations\DependencyFactory
	{
		return $this->getService('nettrine.migrations.nettrineDependencyFactory')->createDependencyFactory();
	}


	public function createServiceNettrine__migrations__diffCommand(): Doctrine\Migrations\Tools\Console\Command\DiffCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\DiffCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__dumpSchemaCommand(): Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\DumpSchemaCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__executeCommand(): Doctrine\Migrations\Tools\Console\Command\ExecuteCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\ExecuteCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__generateCommand(): Doctrine\Migrations\Tools\Console\Command\GenerateCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\GenerateCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__latestCommand(): Doctrine\Migrations\Tools\Console\Command\LatestCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\LatestCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__listCommand(): Doctrine\Migrations\Tools\Console\Command\ListCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\ListCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__migrateCommand(): Doctrine\Migrations\Tools\Console\Command\MigrateCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\MigrateCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__migrationFactory(): Nettrine\Migrations\Version\DbalMigrationFactory
	{
		return new Nettrine\Migrations\Version\DbalMigrationFactory(
			$this,
			$this->getService('nettrine.dbal.connection'),
			$this->getService('contributte.monolog.logger.default'),
		);
	}


	public function createServiceNettrine__migrations__nettrineDependencyFactory(): Nettrine\Migrations\DI\DependencyFactory
	{
		return new Nettrine\Migrations\DI\DependencyFactory(
			$this->getService('nettrine.migrations.configuration'),
			$this->getService('nettrine.migrations.migrationFactory'),
			$this->getService('nettrine.dbal.connection'),
			$this->getService('nettrine.orm.entityManagerDecorator'),
			$this->getService('contributte.monolog.logger.default'),
		);
	}


	public function createServiceNettrine__migrations__rollupCommand(): Doctrine\Migrations\Tools\Console\Command\RollupCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\RollupCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__statusCommand(): Doctrine\Migrations\Tools\Console\Command\StatusCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\StatusCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__syncMetadataCommand(): Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\SyncMetadataCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__upToDateCommand(): Doctrine\Migrations\Tools\Console\Command\UpToDateCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\UpToDateCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__migrations__versionCommand(): Doctrine\Migrations\Tools\Console\Command\VersionCommand
	{
		return new Doctrine\Migrations\Tools\Console\Command\VersionCommand($this->getService('nettrine.migrations.dependencyFactory'));
	}


	public function createServiceNettrine__orm__annotations__annotationDriver(): Doctrine\ORM\Mapping\Driver\AnnotationDriver
	{
		$service = new Doctrine\ORM\Mapping\Driver\AnnotationDriver($this->getService('nettrine.annotations.reader'));
		$service->addExcludePaths([]);
		$service->addPaths(['/__app__/app/model/Database/Entity']);
		return $service;
	}


	public function createServiceNettrine__orm__cache__cacheConfiguration(): Doctrine\ORM\Cache\CacheConfiguration
	{
		$service = new Doctrine\ORM\Cache\CacheConfiguration;
		$service->setCacheFactory($this->getService('nettrine.orm.cache.cacheFactory'));
		return $service;
	}


	public function createServiceNettrine__orm__cache__cacheFactory(): Doctrine\ORM\Cache\DefaultCacheFactory
	{
		return new Doctrine\ORM\Cache\DefaultCacheFactory(
			$this->getService('nettrine.orm.cache.regions'),
			$this->getService('nettrine.cache.driver'),
		);
	}


	public function createServiceNettrine__orm__cache__regions(): Doctrine\ORM\Cache\RegionsConfiguration
	{
		return new Doctrine\ORM\Cache\RegionsConfiguration;
	}


	public function createServiceNettrine__orm__configuration(): Doctrine\ORM\Configuration
	{
		$service = new Doctrine\ORM\Configuration;
		$service->setProxyDir('/__app__/app/../var/tmp/proxies');
		$service->setAutoGenerateProxyClasses(2);
		$service->setProxyNamespace('Nettrine\Proxy');
		$service->setMetadataDriverImpl($this->getService('nettrine.orm.mappingDriver'));
		$service->setCustomStringFunctions([]);
		$service->setCustomNumericFunctions([]);
		$service->setCustomDatetimeFunctions([]);
		$service->setCustomHydrationModes([]);
		$service->setNamingStrategy(new Doctrine\ORM\Mapping\UnderscoreNamingStrategy);
		$service->setEntityListenerResolver($this->getService('nettrine.orm.entityListenerResolver'));
		$service->setQueryCacheImpl($this->getService('nettrine.cache.driver'));
		$service->setHydrationCacheImpl($this->getService('nettrine.cache.driver'));
		$service->setResultCacheImpl($this->getService('nettrine.cache.driver'));
		$service->setMetadataCacheImpl($this->getService('nettrine.cache.driver'));
		$service->setSecondLevelCacheEnabled(true);
		$service->setSecondLevelCacheConfiguration($this->getService('nettrine.orm.cache.cacheConfiguration'));
		return $service;
	}


	public function createServiceNettrine__orm__entityListenerResolver(): Nettrine\ORM\Mapping\ContainerEntityListenerResolver
	{
		return new Nettrine\ORM\Mapping\ContainerEntityListenerResolver($this);
	}


	public function createServiceNettrine__orm__entityManagerDecorator(): App\Model\Database\EntityManager
	{
		return new App\Model\Database\EntityManager(Doctrine\ORM\EntityManager::create(
			$this->getService('nettrine.dbal.connection'),
			$this->getService('nettrine.orm.configuration'),
			$this->getService('nettrine.dbal.eventManager.debug'),
		));
	}


	public function createServiceNettrine__orm__managerRegistry(): Nettrine\ORM\ManagerRegistry
	{
		return new Nettrine\ORM\ManagerRegistry(
			$this->getService('nettrine.dbal.connection'),
			$this->getService('nettrine.orm.entityManagerDecorator'),
			$this,
		);
	}


	public function createServiceNettrine__orm__mappingDriver(): Doctrine\Persistence\Mapping\Driver\MappingDriverChain
	{
		$service = new Doctrine\Persistence\Mapping\Driver\MappingDriverChain;
		$service->addDriver($this->getService('nettrine.orm.annotations.annotationDriver'), 'App\Model\Database\Entity');
		return $service;
	}


	public function createServiceRouter(): Nette\Routing\Router
	{
		return $this->getService('04')->create();
	}


	public function createServiceSecuritFy__passwords(): App\Model\Security\Passwords
	{
		return new App\Model\Security\Passwords;
	}


	public function createServiceSecurity__authenticator(): App\Model\Security\Authenticator\UserAuthenticator
	{
		return new App\Model\Security\Authenticator\UserAuthenticator(
			$this->getService('nettrine.orm.entityManagerDecorator'),
			$this->getService('securitFy.passwords'),
		);
	}


	public function createServiceSecurity__authorizator(): App\Model\Security\Authorizator\StaticAuthorizator
	{
		return new App\Model\Security\Authorizator\StaticAuthorizator;
	}


	public function createServiceSecurity__legacyUserStorage(): Nette\Security\IUserStorage
	{
		return new Nette\Http\UserStorage($this->getService('session.session'));
	}


	public function createServiceSecurity__passwords(): Nette\Security\Passwords
	{
		return new Nette\Security\Passwords;
	}


	public function createServiceSecurity__user(): App\Model\Security\SecurityUser
	{
		$service = new App\Model\Security\SecurityUser(
			$this->getService('security.legacyUserStorage'),
			$this->getService('security.authenticator'),
			$this->getService('security.authorizator'),
			$this->getService('security.userStorage'),
		);
		$this->getService('tracy.bar')->addPanel(new Nette\Bridges\SecurityTracy\UserPanel($service));
		$service->onLoggedIn[] = function() {$this->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Security\LoggedInEvent(...func_get_args()));};
		$service->onLoggedOut[] = function() {$this->getService('contributte.events.dispatcher')->dispatch(new Contributte\Events\Extra\Event\Security\LoggedOutEvent(...func_get_args()));};
		return $service;
	}


	public function createServiceSecurity__userStorage(): Nette\Security\UserStorage
	{
		$service = new Nette\Bridges\SecurityHttp\SessionStorage($this->getService('session.session'));
		$service->setNamespace('Webapp');
		return $service;
	}


	public function createServiceSession__session(): Nette\Http\Session
	{
		$service = new Nette\Http\Session($this->getService('http.request'), $this->getService('http.response'));
		$service->setExpiration('1 year');
		$service->setOptions([
			'cookieHttponly' => true,
			'cookieSamesite' => 'Lax',
			'name' => 'SID',
			'sidBitsPerCharacter' => 6,
			'sidLength' => 128,
			'useCookies' => true,
			'useOnlyCookies' => true,
			'useStrictMode' => true,
			'readAndClose' => null,
		]);
		return $service;
	}


	public function createServiceTracy__bar(): Tracy\Bar
	{
		return Tracy\Debugger::getBar();
	}


	public function createServiceTracy__blueScreen(): Tracy\BlueScreen
	{
		return Tracy\Debugger::getBlueScreen();
	}


	public function createServiceTracy__logger(): Tracy\ILogger
	{
		return Tracy\Debugger::getLogger();
	}


	public function initialize()
	{
		Doctrine\Common\Annotations\AnnotationRegistry::registerUniqueLoader("class_exists");
		// di.
		(function () {
			$this->getService('tracy.bar')->addPanel(new Nette\Bridges\DITracy\ContainerPanel($this));
		})();
		// http.
		(function () {
			$response = $this->getService('http.response');
			$response->setHeader('X-Powered-By', 'Nette Framework 3');
			$response->setHeader('Content-Type', 'text/html; charset=utf-8');
			$response->setHeader('X-Frame-Options', 'SAMEORIGIN');
			Nette\Http\Helpers::initCookie($this->getService('http.request'), $response);
		})();
		// php.
		(function () {
			date_default_timezone_set('Europe/Prague');
			ini_set('output_buffering', '4096');
		})();
		// session.
		(function () {
			$this->getService('session.session')->autoStart(false);
		})();
		// tracy.
		(function () {
			if (!Tracy\Debugger::isEnabled()) { return; }
			Tracy\Debugger::$email = 'dev@dev.dev';
			Tracy\Debugger::$logSeverity = 32767;
			Tracy\Debugger::$strictMode = true;
			Tracy\Debugger::getLogger()->mailer = [
				new Tracy\Bridges\Nette\MailSender($this->getService('mail.mailer'), null),
				'send',
			];
		})();
		$this->getService("tracy.logger");
		Tracy\Debugger::setLogger($this->getService('contributte.monolog.psrToTracyLazyAdapter'));
		Contributte\Monolog\LoggerHolder::setLogger('contributte.monolog.logger.default', $this);
		$this->getService('tracy.bar')->addPanel($this->getService('contributte.translation.tracyPanel'));
	}
}
