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

    public function httpAction()
    {
        $data = $this->getRequest();             //Request object
        //print_r($data);
        $data = $this->getResponse();            //Response object
        //print_r($data);

        $data = $this->getRequest()->getUri();     //URI
        //print_r($data);
        $data = $this->getRequest()->getCookie();  //Cookies
        //print_r($data);
        $data = $this->getRequest()->getServer();  //Server vars
        //print_r($data);
        $data = $this->getRequest()->getHeaders();  //headers
        //print_r($data);
        $data = $this->getRequest()->getHeader('Host');  //header host
        print_r($data);

        $data = $this->params()->fromPost('foo');  //POST
        $data = $this->params()->fromQuery('foo'); //GET
        $data = $this->params()->fromRoute('foo'); //RouteMatch
        $data = $this->params()->fromHeader('foo');//Header
        $data = $this->params()->fromFiles('foo'); //Uploaded file

        $data = $this->getRequest()->isXmlHttpRequest();
        $data = $this->getRequest()->isPost();
        exit;
    }
}