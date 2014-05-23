<?php

namespace Manual\Service\Initializer;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\InitializerInterface;

class InitializerByClass implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof \stdClass) {
            $instance->initialized = 'initialized!';
        }
    }
}