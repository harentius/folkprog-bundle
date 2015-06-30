<?php

namespace Harentius\BlogBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('harentius_blog');

        $rootNode->children()
            ->arrayNode('sidebar')
                ->children()
                    ->scalarNode('cache_filefime')->defaultValue(0)->end()
                    ->integerNode('tags_limit')->defaultValue(10)->end()
                    ->arrayNode('tag_sizes')
                        ->prototype('integer')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
