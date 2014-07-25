<?php
/**
 * Example of configuration
 */

return array(
    'smarty' => array(
        // Smarty options [default: []]
        'options' => array(
            'force_compile' => true,
            'debugging' => true,
            'escape_html' => true,
            'compile_dir' => __DIR__ . '/../../data/templates_c',
        ),

        // Enable ViewHelper functions [default: true]
        'enable_helper_functions' => true,

        // Enable ViewHelper object [default: true]
        'enable_helper_object' => true,

        // Assigning name of ViewHelper object [default: 'this']
        'assigning_helper_name' => 'this',
    ),
);
