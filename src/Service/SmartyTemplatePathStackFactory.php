<?php
namespace ZendSmarty\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Resolver\TemplatePathStack;
use ZendSmarty\ModuleOptions;

class SmartyTemplatePathStackFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $config ModuleOptions */
        $config = $serviceLocator->get('ZendSmarty\ModuleOptions');

        /* @var $orig TemplatePathStack */
        $orig = $serviceLocator->get('ViewTemplatePathStack');

        $instance = new TemplatePathStack();
        $instance->addPaths($orig->getPaths()->toArray());
        $instance->setDefaultSuffix($config->suffix);

        return $instance;
    }
}
