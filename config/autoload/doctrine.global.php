<?php

// In a real-world ZF2 application you put this doctrine config into your module.

namespace Entity;

return array(
    'doctrine' => array(
        'driver' => array(
            // defines an annotation driver with one path, and names it `my_annotation_driver`
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../../src/' . __NAMESPACE__,

                ),
            ),
            // default metadata driver, aggregates all other drivers into a single one.
            // Override `orm_default` only if you know what you're doing
            'orm_default' => array(
                'drivers' => array(
                    // register `my_annotation_driver` for any entity under namespace `Entity`
                    __NAMESPACE__ => __NAMESPACE__ . '_driver'
                )
            )
        ),
    ),
);