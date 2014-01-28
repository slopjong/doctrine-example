<?php

// In a real-world ZF2 application you put this doctrine config into your module.

// You would normally not commit this file since it contains credentials.
// However, this doesn't matter a lot here because they're for vagrant only.
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'      => 'localhost',
                    'port'      => '3306',
                    'user'      => 'vagrant',
                    'charset'   => 'utf8',
                    'password'  => 'vagrant',
                    'dbname'    => 'vagrant',
                ),
            ),
        ),
    ),
);