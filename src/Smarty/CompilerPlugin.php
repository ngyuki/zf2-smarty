<?php
namespace ZendSmarty\Smarty;

use Zend\View\HelperPluginManager;

class CompilerPlugin
{
    /**
     * @var HelperPluginManager
     */
    private $helpers;

    /**
     * @var array
     */
    private $registered;

    public function __construct(HelperPluginManager $helpers)
    {
        $this->helpers = $helpers;
    }

    public function register(\Smarty $smarty)
    {
        $smarty->registerFilter('pre', array($this, 'preFilter'));
        $smarty->registerPlugin('compiler', 'do', array($this, 'compile_do'));
    }

    public function preFilter($source, $smarty)
    {
        $hash = spl_object_hash($smarty->smarty);

        if (isset($this->registered[$hash]) == false) {
            // Register the Compiler Plugin only when need to compile
            $this->registerCompiler($smarty->smarty);
            $this->registered[$hash] = true;
        }

        return $source;
    }

    private function registerCompiler(\Smarty $smarty)
    {
        $names = array();

        foreach ($this->helpers->getRegisteredServices() as $services) {
            $names = array_merge($names, $services);
        }

        $names = array_flip($names);
        $names = array_keys($names);

        foreach ($names as $name) {
            $smarty->registerPlugin('compiler', $name, array(__CLASS__, $name));
        }
    }

    private static function snippet()
    {
        /* @var $_smarty_tpl \Smarty_Internal_Template */
        return "\$_smarty_tpl->smarty->registered_plugins['compiler']['do'][0][0]";
    }

    public static function __callStatic($name, $arguments)
    {
        list ($args) = $arguments;

        $name = var_export($name, true);
        $args = implode(",", $args);
        $snippet = self::snippet();

        return "<?php echo call_user_func(array($snippet,$name),$args) ?".">";
    }

    public function __call($name, $args)
    {
        return call_user_func_array($this->helpers->get($name), $args);
    }

    public function compile_do($args /*, \Smarty_Internal_SmartyTemplateCompiler $obj*/)
    {
        $args = implode(",", $args);
        $snippet = self::snippet();
        return "<?php echo {$snippet}->perform_do(array($args)) ?".">";
    }

    public function perform_do($args)
    {
        $name = array_shift($args);

        if (is_string($name) == false) {
            return null;
        }

        if ($this->helpers->has($name) == false) {
            return null;
        }

        call_user_func_array($this->helpers->get($name), $args);
    }
}
