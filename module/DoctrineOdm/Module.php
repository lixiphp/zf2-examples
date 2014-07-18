<?php
namespace DoctrineOdm;

use DoctrineOdm\Document\User;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onBootstrap($e)
    {
        $app = $e->getParam('application');
        $sm = $app->getServiceManager();
        $dm = $sm->get('doctrine.documentmanager.odm_default');
        // Remove All
        $users = $dm->getRepository('DoctrineOdm\Document\User')->findAll();
        foreach ($users as $user) {
            $dm->remove($user);
        }
        $dm->persist($user);
        $dm->flush();

        // Insert
        $user = new \DoctrineOdm\Document\User();
        $user->setname('Time'.date('Ymdhis'));
        $user->setEmail('email@example.com');
        $user->setFirstName('Saeed');
        $user->setLastName('Ahmed');
        $dm->persist($user);
        $dm->flush();

        // Find All
        $users = $dm->getRepository('DoctrineOdm\Document\User')->findAll();
        foreach ($users as $user) {
            var_dump($user->getName());
        }
    }
}
