<?php
namespace Theodo\Evolution\LegacyModelBundle\Service;

use Theodo\Evolution\LegacyModelBundle\Service\AutoloadService;
use Symfony\Component\DependencyInjection\Container;

class Doctrine1Service {

	protected $databaseManager;

	public function __construct(Container $container)
	{
		$config = $container->getParameter('theodo_evolution_legacy_model');

		$path = $config['path'];
		$user = $config['user'];
		$password = $config['password'];
		$host = $config['host'];
		$dbname = $config['dbname'];


		require_once $path;
		spl_autoload_register(array('Doctrine', 'autoload'));
		$manager = \Doctrine_Manager::getInstance();

		// TODO: Make a configuration
		$db['dsn'] = "mysql://$user:$password@$host/$dbname"; 
		$conn = \Doctrine_Manager::connection($db['dsn'], 'doctrine');


		// TODO: Make a service
		$autoloadService = new AutoloadService();


		// TODO: Make a configuration
		$autoloadService->register('../legacy/lib/model/doctrine/');
		$autoloadService->register('../legacy/lib/vendor/symfony/plugins/sfDoctrinePlugin/lib/');
		$autoloadService->register('../legacy/lib/vendor/symfony/exception/');
		$autoloadService->register('../legacy/plugins/sfThumbnailPlugin/lib/');
		$autoloadService->register('../legacy/plugins/sfThumbnailPlugin/lib/');
		$autoloadService->register('../legacy/plugins/sfDoctrineThumbnailablePlugin/lib/', 'Doctrine');


	}	
}	



