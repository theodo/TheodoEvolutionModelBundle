<?php
namespace Theodo\Evolution\LegacyModelBundle\Service;

use Theodo\Evolution\LegacyModelBundle\Service\AutoloadService;
use Symfony\Component\DependencyInjection\Container;

class Doctrine1Service {

	protected $databaseManager;

	public function __construct(Container $container, AutoloadService $autoloadService)
	{
        $config = $container->getParameter('theodo_evolution_legacy_model');

        $this->doctrineConnection($config);
        $this->autoloadRepositories($autoloadService, $config);
    }   

    public function doctrineConnection($config)
    {
        require_once $config['path'];
        spl_autoload_register(array('Doctrine', 'autoload'));

        $user = $config['user'];
        $password = $config['password'];
        $host = $config['host'];
        $dbname = $config['dbname'];

        $db['dsn'] = "mysql://$user:$password@$host/$dbname"; 
        $conn = \Doctrine_Manager::connection($db['dsn'], 'doctrine');

        $manager = \Doctrine_Manager::getInstance();
    }

    public function autoloadRepositories(AutoloadService $autoloadService, $config)
    {
        $autoloadService->register('../legacy/lib/model/doctrine/');
        $autoloadService->register('../legacy/lib/vendor/symfony/plugins/sfDoctrinePlugin/lib/');
        $autoloadService->register('../legacy/lib/vendor/symfony/exception/');

        foreach ($config['autoload'] as $info) {
            $option = array(
                'prefix' => $info['prefix'], 
                'extension' => $info['extension']
            );
            $autoloadService->register($info['path'], $option);
        }        
    }
}	



