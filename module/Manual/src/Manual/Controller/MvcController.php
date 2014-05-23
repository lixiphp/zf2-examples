<?php

namespace Manual\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

Class MvcController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new JsonModel(array('success' => '1','data'=>'foo'));
        echo $view->serialize();
        $response = $this->getResponse();
        $response->setStatusCode(200);
        return $response;
    }
}