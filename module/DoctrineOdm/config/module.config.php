<?php
return array(
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver',

                'paths' => array(__DIR__ . '/../src/DoctrineOdm/Document')
            ),
            'odm_default' => array(
                'drivers' => array(
                    'DoctrineOdm\Document' => __NAMESPACE__ . '_driver'
                )
            )
        )
    )
);