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