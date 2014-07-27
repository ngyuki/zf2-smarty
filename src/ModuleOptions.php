<?php
namespace ZendSmarty;

/**
 * @property-read array   $options
 * @property-read boolean $enable_helper_functions
 * @property-read boolean $enable_helper_object
 * @property-read string  $assigning_helper_name
 */
class ModuleOptions
{
    /**
     * @var array
     */
    protected $options = array();

    /**
     * @var boolean
     */
    protected $enable_helper_functions = true;

    /**
     * @var boolean
     */
    protected $enable_helper_object = true;

    /**
     * @var string
     */
    protected $assigning_helper_name = 'this';

    public function __get($name)
    {
        return $this->$name;
    }
}
