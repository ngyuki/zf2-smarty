<?php
return array(
    'modules' => array(
        'Application',
        'ZendSmarty',
    ),

    'module_listener_options' => array(
        'module_paths' => array(
            'Application' => __DIR__ . '/../module/src/',
        ),
        'config_glob_paths' => array(
            __DIR__ . "/autoload/{,*.}{global,local}.php",
        ),
        'config_cache_enabled' => false,
        'config_cache_key' => 'config_cache',
        'module_map_cache_enabled' => false,
        'module_map_cache_key' => 'module_map_cache',
        'cache_dir' => __DIR__ . '/../data/cache/',
        'check_dependencies' => true,
        'extra_config' => array(),
    ),

    'service_manager' => array(),

    'listeners' => array(),
);
