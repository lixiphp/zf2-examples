<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'DoctrineOrm' . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/DoctrineOrm/Model'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'DoctrineOrm'.'\Model' => 'DoctrineOrm' . '_driver'
                )
            )
        ),
        'orm_autoload_annotations' => true,
    )
);