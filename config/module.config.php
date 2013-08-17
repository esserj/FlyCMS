<?php
return array(
    'flycms' => array(
        'mapper' => array(
            'role' => array(
                'entityClass' => 'FlyCMS\Entity\Role'
            )
        )
    ),
    'zfctwig' => array(
        'extensions' => array(
            'flycms' => 'FlyCmsExtension'
        ),
        /**
         * If set to true disables ZF's notion of parent/child layouts in favor of
         * Twig's inheritance model.
         */
        'disable_zf_model' => false,
    ),
    'zfcrbac' => array(
        'providers' => array(
            'FlyCMS\Provider\AdjacencyList\Role\DoctrineORM' => array(),
        ),
        'firewalls' => array(
            'ZfcRbac\Firewall\Controller' => array(
                array('controller' => 'index', 'actions' => 'index', 'roles' => 'guest')
            ),
            'ZfcRbac\Firewall\Route' => array(
                array('route' => 'profiles/add', 'roles' => 'member'),
                array('route' => 'admin/*', 'roles' => 'administrator')
            ),
        ),
        /**
         * have identities provided by zfc-user module
         */
        'identity_provider' => 'zfcuser_auth_service'
    ),
    'zfcuser' => array(
        'userEntityClass' => 'FlyCMS\Entity\User'
    ),
    'doctrine' => array(
        'driver' => array(
            'FlyCmsEntity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/xml/doctrine'
            ),

            'orm_default' => array(
                'drivers' => array(
                    'FlyCMS\Entity'  => 'FlyCmsEntity'
                )
            )
        )
    )
);