<?php
return array(
    'router' => include __DIR__ . '/router.config.php',

    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
        ),
    ),

    'service_manager' => array(),

    'view_manager' => array(
        'display_not_found_reason'  => true,
        'display_exceptions'        => true,
        'doctype'                   => 'HTML5',
        'not_found_template'        => 'error/404',
        'exception_template'        => 'error/index',
        'template_map' => array(
            'layout/layout'         => __DIR__ . '/../view/layout/smarty.tpl',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
