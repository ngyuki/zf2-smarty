<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'ZendSmarty\View\Strategy\SmartyStrategy' => 'ZendSmarty\View\Strategy\SmartyStrategyFactory',
        ),
        'aliases' => array(
            'SmartyStrategy' => 'ZendSmarty\View\Strategy\SmartyStrategy',
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'SmartyStrategy',
        ),
    ),
);
