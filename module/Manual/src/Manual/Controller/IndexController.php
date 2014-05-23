<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Manual\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $serviceLocator = $this->getServiceLocator();
        // Invokables
        $service = $serviceLocator->get('invoke_by_class');
        //print_r($service);
        // Factories
        $service = $serviceLocator->get('factory_by_callback');
        //print_r($service);
        $service = $serviceLocator->get('factory_by_class');
        //print_r($service);
        $service = $serviceLocator->get('factory_by_instance');
        //print_r($service);
        // Alias
        $service = $serviceLocator->get('alias_translator');
        //print_r($service);
        // Abstract Factories
        $service = $serviceLocator->get('foo');
        //print_r($service);
        $service = $serviceLocator->get('bar');
        //print_r($service);
        //$service = $serviceLocator->get('baz');
        //print_r($service); exception! Zend\ServiceManager\Exception\ServiceNotFoundException
        // Initializers
        $service = $serviceLocator->get('factory_by_callback');
        //print_r($service)
        // Shared
        $service->ddd = 'sss';
        //print_r($service);
        $service = $serviceLocator->get('factory_by_callback');
        //print_r($service);
        // Config
        $service = $serviceLocator->get('config');
        //print_r($service);
        exit;
    }
}
