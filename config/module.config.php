<?php
return array(
    'flycms' => array(

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
        'userEntityClass' => 'FlyCMS\User\Entity\User'
    ),
    'doctrine' => array(
        'driver' => array(
            'zfcuser_entity' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\XmlDriver',
                'paths' => __DIR__ . '/xml/flycmszfcuserdoctrineorm'
            ),

            'orm_default' => array(
                'drivers' => array(
                    'FlyCMS\User\Entity'  => 'zfcuser_entity'
                )
            )
        )
    )
);