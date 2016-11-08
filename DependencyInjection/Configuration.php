<?php

namespace ApnsBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * Generates the configuration tree builder.
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('apns_php_wrapper');

        $rootNode
            ->children()
                ->scalarNode('pem_path')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('environment')
                    ->defaultValue('sandbox')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
