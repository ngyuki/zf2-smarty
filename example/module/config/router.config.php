<?php
return array(
    'routes' => array(

        'home' => array(
            'type' => 'literal',
            'options' => array(
                'route'    => '/',
                'defaults' => array(
                    'controller' => 'Application\Controller\Index',
                    'action'     => 'index',
                ),
            ),
        ),
    ),
);
