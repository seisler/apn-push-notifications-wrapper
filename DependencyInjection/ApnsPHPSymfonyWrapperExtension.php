<?php

namespace ApnsBundle\DependencyInjection;

use ApnsPHP_Abstract;
use ApnsPHP_Push;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ApnsPHPSymfonyWrapperExtension extends Extension
{

    /**
     * Loads a specific configuration.
     *
     * @param array $configs An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yml');
        $loader->load('parameters.yml');

        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $configs);

        if($config['environment'] == 'sandbox') {
            $env = ApnsPHP_Abstract::ENVIRONMENT_SANDBOX;
        } else {
            $env = ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION;
        }

        $apns = new ApnsPHP_Push(
            $env,
            $config['pem_file']
        );

        $container->set('apns_php', $apns);
    }
}