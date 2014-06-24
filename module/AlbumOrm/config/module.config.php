<?php
namespace Albumorm;

return array(

    // Controllers in this module
    'controllers' => array(
        'classes' => array(
            'Albumorm\Controller\Albumorm' => 'Albumorm\Controller\AlbumormController'
        ),
        'invokables' => array(
            'Albumorm\Controller\Albumorm' => 'Albumorm\Controller\AlbumormController',
        ),
    ),

    // Routes for this module
    'router' => array(
        'routes' => array(
            'albumorm' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/albumorm[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Albumorm\Controller\Albumorm',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),    

    // View setup for this module
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    // Doctrine config
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),

    'navigation' => array(
        'default' => array(
            array(
                'label' => 'AlbumOrm',
                'route' => 'albumorm',
                'pages' => array(
                    array(
                        'label' => 'Add',
                        'route' => 'albumorm',
                        'action' => 'add',
                    ),
                    array(
                        'label' => 'List',
                        'route' => 'albumorm',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
);
