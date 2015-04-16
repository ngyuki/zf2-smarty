<?php
namespace ZendSmarty\View;

use Zend\View\Exception;
use Zend\View\HelperPluginManager;
use Zend\View\Model\ModelInterface;
use Zend\View\Renderer\RendererInterface;
use Zend\View\Resolver\ResolverInterface;

use ZendSmarty\ModuleOptions;
use ZendSmarty\Smarty\CompilerPlugin;
use ZendSmarty\Smarty\HelperProxy;

class SmartyRenderer implements RendererInterface
{
    /**
     * @var \Smarty
     */
    private $smarty;

    /**
     * @var ModuleOptions
     */
    private $config;

    /**
     * @var ResolverInterface
     */
    private $resolver;

    /**
     * @var HelperPluginManager
     */
    private $helpers;

    /**
     * @param ModuleOptions $config
     * @param HelperPluginManager $helpers
     */
    public function __construct(ModuleOptions $config, HelperPluginManager $helpers)
    {
        $this->smarty = new \Smarty();
        $this->config = $config;
        $this->helpers = $helpers;

        foreach ($config->options as $key => $val) {
            $this->smarty->$key = $val;
        }

        if ($config->enable_helper_functions) {
            $compilerPlugin = new CompilerPlugin($helpers);
            $compilerPlugin->register($this->smarty);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getEngine()
    {
        return $this->smarty;
    }

    /**
     * {@inheritDoc}
     */
    public function setResolver(ResolverInterface $resolver)
    {
        $this->resolver = $resolver;
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @see PhpRenderer::render
     */
    public function render($nameOrModel, $values = null)
    {
        if ($nameOrModel instanceof ModelInterface) {
            $model = $nameOrModel;
            $nameOrModel = $model->getTemplate();

            if (empty($nameOrModel)) {
                $msg = '%s: received View Model argument, but template is empty';
                throw new Exception\DomainException(sprintf($msg, __METHOD__));
            }

            $values = $model->getVariables();

            if ($values instanceof \ArrayObject) {
                $values = $values->getArrayCopy();
            }
        }

        $tpl = $this->resolver->resolve($nameOrModel);

        $this->smarty->clearAllAssign();
        $this->smarty->assign($values);

        if ($this->config->enable_helper_object) {
            $this->smarty->assign(
                $this->config->assigning_helper_name,
                new HelperProxy($this->helpers)
            );
        }

        $content = $this->smarty->fetch($tpl);
        return $content;
    }

    /**
     * @param $nameOrModel
     * @return bool
     */
    public function canRender($nameOrModel)
    {
        if ($nameOrModel instanceof ModelInterface) {
            $nameOrModel = $nameOrModel->getTemplate();
        }

        $tpl = $this->resolver->resolve($nameOrModel);
        return strlen($tpl) != 0;
    }
}
