<?php

namespace Seisler\ApnsBundle;

use Seisler\ApnsBundle\DependencyInjection\ApnsDuccioWrapperExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class ApnsBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }

    /**
     * @return ApnsDuccioWrapperExtension
     */
    public function getContainerExtension()
    {
        return new ApnsDuccioWrapperExtension();
    }
}
