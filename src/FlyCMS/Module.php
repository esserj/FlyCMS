<?php

namespace FlyCMS;


use FlyCMS\Twig\Extension\FlyCms;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\MvcEvent;

class Module implements BootstrapListenerInterface, ConfigProviderInterface, ServiceProviderInterface
{



    /**
     * Listen to the bootstrap event
     *
     * @param MvcEvent|EventInterface $e
     * @return array
     */
    public function onBootstrap(EventInterface $e)
    {

        $application    = $e->getApplication();
        $serviceManager = $application->getServiceManager();
        $config = $serviceManager->get('Configuration');
        $test='';
    }


    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'FlyCmsExtension' => function(){
                   return new FlyCms();
                },
                'zfcuser_user_mapper' => function ($sm) {
                    return new User\Mapper\User(
                        $sm->get('zfcuser_doctrine_em'),
                        $sm->get('zfcuser_module_options')
                    );
                },
            ),
        );
    }
}
