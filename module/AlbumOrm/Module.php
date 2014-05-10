<?php

namespace Albumorm;

use Zend\Form\View\HelperLoader as FormHelperLoader;
use Albumorm\Model\AlbumormTable;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getServiceConfiguration()
    {
        return array(
            'factories' => array(
                'album-table' =>  function($sm) {
                    $dbAdapter = $sm->get('db-adapter');
                    $table = new AlbumormTable($dbAdapter);
                    return $table;
                },
            ),
        );
    }

    public function getViewHelperConfig()
    {
        return array(
            'invokables' => array(
                'Escape' => 'Albumorm\View\Helper\Escape',
            )
        );
    }

}
