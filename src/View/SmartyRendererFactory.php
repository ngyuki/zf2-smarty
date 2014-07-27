<?php
namespace ZendSmarty\View;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SmartyRendererFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('ZendSmarty\ModuleOptions');
        $resolver = $serviceLocator->get('SmartyResolver');
        $helpers = $serviceLocator->get('ViewHelperManager');

        $renderer = new SmartyRenderer($config, $helpers);
        $renderer->setResolver($resolver);
        return $renderer;
    }
}
