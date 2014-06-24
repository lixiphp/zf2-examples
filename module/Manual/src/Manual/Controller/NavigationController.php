<?php

namespace Manual\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class NavigationController extends AbstractActionController
{
    public function indexAction()
    {
        return array();
    }

    public function listAction()
    {
        return array();
    }

    public function addAction()
    {
        $view = new ViewModel();
        $config = $this->getServiceLocator()->get('config');
        $config['navigation']['breadcrumb']['home']['pages']['project']['pages'][] = array(
            'label' => '添加导航',
            'route' => 'manual/default',
            'controller' => 'navigation',
            'action' => 'add',
            'pages' => array(
                array(
                    'label' => '导航删除',
                    'route' => 'manual/default',
                    'controller' => 'navigation',
                    'action' => 'delete',
                ),
            ),
        );
        $container = new \Zend\Navigation\Navigation($config['navigation']['breadcrumb']);
        $viewHelper = $this->getServiceLocator()->get('viewHelperManager');
        $nav = $viewHelper->get('navigation');
        $navi = $nav($container);
        print_r($navi->breadcrumbs()->renderStraight());
        return $view;
    }

    public function deleteAction()
    {
        return array();
    }
}