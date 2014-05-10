<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $serviceLocator = $this->getServiceLocator();
        $config = $serviceLocator->get('config');
        return array(
                    'version'=> $config['application']['version'],
                    'applicationName' => $config['application']['name']
                );
    }

    public function aboutAction()
    {
        $layout = new ViewModel();
        $layout->setTemplate('layout/layout');

        //change the layout
        $this->layout()->setTemplate("layout/layout_new");

        $viewModel = new ViewModel();
        $viewModel->setVariable('version', '0.0.2');
        $viewModel->setVariable('applicationName', 'Training Center!');
        $viewModel->setTemplate('application/index/index');
        //terminal output.
        //$viewModel->setTerminal(true);

        //$layout->addChild($viewModel, 'content');
        return $viewModel;
    }
}
