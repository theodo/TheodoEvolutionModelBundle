<?php

namespace Theodo\Evolution\LegacyModelBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Yaml\Parser;
use Theodo\Evolution\LegacyModelBundle\DependencyInjection\TheodoEvolutionLegacyModelExtension;

/**
 * User: cyrillej
 * Date: 10/9/12
 * Tests the Theodo\Evolution\LegacyModelBundle\DependencyInjection\TheodoEvolutionLegacyModelExtension class
 */
class TheodoEvolutionLegacyModelExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testConfiguration()
    {
        $extension = new TheodoEvolutionLegacyModelExtension();

        $config = $this->getConfiguration();
        $extension->load(array($config), new ContainerBuilder());
    }

    public function getConfiguration()
    {
        $config = <<<YAML
path:       'path/to/the/Doctrine.php/file'
user:       user
password:   pwd
host:       localhost
dbname:     mydatabase
YAML;

        $parser = new Parser();

        return $parser->parse($config);
    }
}
