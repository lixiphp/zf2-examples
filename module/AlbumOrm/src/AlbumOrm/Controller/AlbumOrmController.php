<?php

namespace Albumorm\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel, 
    Albumorm\Form\AlbumormForm,
    Doctrine\ORM\EntityManager,
    Albumorm\Entity\Albumorm;

class AlbumormController extends AbstractActionController
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    protected $em;

    public function setEntityManager(EntityManager $em)
    {
        $this->em = $em;
    }
 
    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    } 

    public function indexAction()
    {
        return new ViewModel(array(
            'albums' => $this->getEntityManager()->getRepository('Albumorm\Entity\Albumorm')->findAll()
        ));
    }

    public function addAction()
    {
        $form = new AlbumormForm();
        $form->get('submit')->setAttribute('label', 'Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $album = new Albumorm();
            
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) { 
                $album->populate($form->getData()); 
                $this->getEntityManager()->persist($album);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('albumorm'); 
            }
        }

        return array('form' => $form);
    }

    public function editAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        if (!$id) {
            return $this->redirect()->toRoute('albumorm', array('action'=>'add'));
        } 
        $album = $this->getEntityManager()->find('Albumorm\Entity\Albumorm', $id);

        $form = new AlbumormForm();
        $form->setBindOnValidate(false);
        $form->bind($album);
        $form->get('submit')->setAttribute('label', 'Edit');
        
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $form->bindValues();
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('albumorm');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    public function deleteAction()
    {
        $id = (int)$this->getEvent()->getRouteMatch()->getParam('id');
        if (!$id) {
            return $this->redirect()->toRoute('albumorm');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->post()->get('del', 'No');
            if ($del == 'Yes') {
                $id = (int)$request->post()->get('id');
                $album = $this->getEntityManager()->find('Albumorm\Entity\Albumorm', $id);
                if ($album) {
                    $this->getEntityManager()->remove($album);
                    $this->getEntityManager()->flush();
                }
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('default', array(
                'controller' => 'album',
                'action'     => 'index',
            ));
        }

        return array(
            'id' => $id,
            'album' => $this->getEntityManager()->find('Albumorm\Entity\Albumorm', $id)->getArrayCopy()
        );
    }
}
