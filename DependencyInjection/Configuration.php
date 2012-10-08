<?php

namespace Theodo\Evolution\LegacyModelBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();

        $rootNode = $treeBuilder->root('theodo_evolution_legacy_model');

        $rootNode
    		->children()
        		->scalarNode('path')->isRequired()->end()
    			->scalarNode('user')->defaultValue('root')->end()
    			->scalarNode('password')->defaultNull()->end()
    			->scalarNode('host')->defaultValue('localhost')->end()
    			->scalarNode('dbname')->end()
    			->arrayNode('autoload')
	    			->prototype('array')
	    				->children()
	    					->scalarNode('path')->isRequired()->end()
	    					->scalarNode('prefix')->defaultNull()->end()
	    				->end()
	    			->end()
	    		->end()
        	->end();

        return $treeBuilder;
    }
}