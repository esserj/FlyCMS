<?php

namespace FlyCMS;

use Zend\Mvc\MvcEvent;


class Module
{
    public function onBootstrap(MvcEvent $e)
    {

    }

    public function getServiceConfig()
    {
        return array(

        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }
}
