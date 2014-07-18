<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'DoctrineOrm' . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/'.'DoctrineOrm'.'/yaml'),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'DoctrineOrm'.'\yaml' => 'DoctrineOrm' . '_driver'
                )
            )
        )
    )
);