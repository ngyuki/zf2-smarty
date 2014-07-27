<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'ZendSmarty\ModuleOptions' => 'ZendSmarty\ModuleOptionsFactory',

            'ZendSmarty\View\SmartyStrategy' => 'ZendSmarty\View\SmartyStrategyFactory',
            'ZendSmarty\View\SmartyRenderer' => 'ZendSmarty\View\SmartyRendererFactory',

            'SmartyResolver'            => 'ZendSmarty\Service\SmartyResolverFactory',
            'SmartyTemplatePathStack'   => 'ZendSmarty\Service\SmartyTemplatePathStackFactory',
            'SmartyTemplateMapResolver' => 'ZendSmarty\Service\SmartyTemplateMapResolverFactory',
        ),
        'aliases' => array(
            'SmartyStrategy' => 'ZendSmarty\View\SmartyStrategy',
            'SmartyRenderer' => 'ZendSmarty\View\SmartyRenderer',
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'SmartyStrategy',
        ),
    ),
);
