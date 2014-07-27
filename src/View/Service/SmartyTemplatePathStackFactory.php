<?php
namespace ZendSmarty\View\Service;

use Zend\Mvc\Service\ViewTemplatePathStackFactory;
use Zend\ServiceManager\ServiceLocatorInterface;

class SmartyTemplatePathStackFactory extends ViewTemplatePathStackFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $instance = parent::createService($serviceLocator);
        $instance->setDefaultSuffix('tpl');
        return $instance;
    }
}
