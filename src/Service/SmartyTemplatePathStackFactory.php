<?php
namespace ZendSmarty\Service;

use Zend\Mvc\Service\ViewTemplatePathStackFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZendSmarty\ModuleOptions;

class SmartyTemplatePathStackFactory extends ViewTemplatePathStackFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $config ModuleOptions */
        $config = $serviceLocator->get('ZendSmarty\ModuleOptions');

        $instance = parent::createService($serviceLocator);
        $instance->setDefaultSuffix($config->suffix);
        return $instance;
    }
}
