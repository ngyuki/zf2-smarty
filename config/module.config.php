<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'ZendSmarty\ModuleOptions' => 'ZendSmarty\ModuleOptionsFactory',

            'ZendSmarty\View\Strategy\SmartyStrategy' => 'ZendSmarty\View\Strategy\SmartyStrategyFactory',
            'ZendSmarty\View\Renderer\SmartyRenderer' => 'ZendSmarty\View\Renderer\SmartyRendererFactory',

            'SmartyResolver' => 'ZendSmarty\View\Service\SmartyResolverFactory',
            'SmartyTemplatePathStack' => 'ZendSmarty\View\Service\SmartyTemplatePathStackFactory',
            'SmartyTemplateMapResolver' => 'ZendSmarty\View\Service\SmartyTemplateMapResolverFactory',
        ),
        'aliases' => array(
            'SmartyStrategy' => 'ZendSmarty\View\Strategy\SmartyStrategy',
            'SmartyRenderer' => 'ZendSmarty\View\Renderer\SmartyRenderer',
        ),
    ),
    'view_manager' => array(
        'strategies' => array(
            'SmartyStrategy',
        ),
    ),
);
