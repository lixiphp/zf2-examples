<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'manual' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/manual',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Manual\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    //invokables, fatories, intializers, aliases and shared
    'service_manager' => array(
        'invokables' => array(
            'invoke_by_class' => 'Manual\Service\Invoke\InvokeByClass',
        ),
        'factories' => array(
            // registering a callback as a factory
            'factory_by_callback' => function () { return new \stdClass(); },
            // registering a factory by factory class name
            'factory_by_class' => 'Manual\Service\Factory\FactoryByClass',
            // registering a factory instance
            'factory_by_instance' => new Manual\Service\Factory\FactoryByClass(),
        ),
        'aliases' => array(
            'alias_translator' => 'MvcTranslator',
        ),
        'abstract_factories' => array(
            'Manual\Service\AbstractFactory\AbstractFactoryByClass'
        ),
        'initializers' => array(
            'Manual\Service\Initializer\InitializerByClass'
        ),
        'shared' => array(
            'factory_by_callback' => false,
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Manual\Controller\Index' => 'Manual\Controller\IndexController'
        ),
    ),
);
