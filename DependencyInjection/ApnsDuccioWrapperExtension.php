<?php

namespace Seisler\ApnsBundle\DependencyInjection;

use ApnsPHP_Abstract;
use ApnsPHP_Push;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ApnsDuccioWrapperExtension
 * @package Seisler\ApnsBundle\DependencyInjection
 */
class ApnsDuccioWrapperExtension extends Extension
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
        $loader = new XmlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.xml');

        $processor = new Processor();
        $configuration = new Configuration();

        $config = $processor->processConfiguration($configuration, $configs);

        if($config['environment'] == 'sandbox') {
            $env = ApnsPHP_Abstract::ENVIRONMENT_SANDBOX;
        } else {
            $env = ApnsPHP_Abstract::ENVIRONMENT_PRODUCTION;
        }

        $container->setParameter('apns_php_wrapper.pem_path', $config['pem_path']);
        $container->setParameter('apns_php_wrapper.environment', $env);
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return 'apns_php_wrapper';
    }
}
