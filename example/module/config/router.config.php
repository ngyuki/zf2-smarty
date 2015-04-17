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

        'foo' => array(
            'type' => 'literal',
            'options' => array(
                'route'    => '/foo',
                'defaults' => array(
                    'controller' => 'Application\Controller\Index',
                    'action'     => 'index',
                ),
            ),
        ),

        'bar' => array(
            'type' => 'segment',
            'options' => array(
                'route'    => '/bar/:id',
                'defaults' => array(
                    'controller' => 'Application\Controller\Index',
                    'action'     => 'index',
                ),
            ),
        ),

        'json' => array(
            'type' => 'literal',
            'options' => array(
                'route'    => '/json',
                'defaults' => array(
                    'controller' => 'Application\Controller\Index',
                    'action'     => 'index',
                    'json'       => true,
                ),
            ),
        ),
    ),
);
