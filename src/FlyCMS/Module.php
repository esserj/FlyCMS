<?php

namespace FlyCMS;


use FlyCMS\Twig\Extension\FlyCms AS FlyCmsTwigExtension;
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
                   return new FlyCmsTwigExtension();
                },
                'FlyCmsRoleMapper' => function ($sm) {
                    return new Mapper\Role(
                        $sm->get('zfcuser_doctrine_em'),
                        $sm->get('FlyCmsRoleMapperOptions')
                    );
                },
                'FlyCmsRoleMapperOptions' => function ($sm) {
                    $config = $sm->get('Configuration');
                    return new Options\RoleMapperOptions(
                        (isset($config['flycms']['mapper']['role'])
                            ? $config['flycms']['mapper']['role']
                            : array())
                    );
                },
            ),
        );
    }
}
