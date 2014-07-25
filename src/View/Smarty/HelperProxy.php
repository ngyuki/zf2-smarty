<?php
namespace ZendSmarty\View\Smarty;

use Zend\View\HelperPluginManager;

class HelperProxy
{
    /**
     * @var HelperPluginManager
     */
    private $helpers;

    /**
     * @param HelperPluginManager $helpers
     */
    public function __construct(HelperPluginManager $helpers)
    {
        $this->helpers = $helpers;
    }

    public function __call($name, $args)
    {
        return call_user_func_array($this->helpers->get($name), $args);
    }
}
