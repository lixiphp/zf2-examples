<?php

namespace Manual\Service\AbstractFactory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\AbstractFactoryInterface;

class AbstractFactoryByClass implements AbstractFactoryInterface
{
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        // this abstract factory only knows about 'foo' and 'bar'
        return $requestedName === 'foo' || $requestedName === 'bar';
    }

    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $service = new \stdClass();

        $service->name = $requestedName;

        return $service;
    }
}