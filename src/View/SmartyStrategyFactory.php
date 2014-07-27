<?php
namespace ZendSmarty\View;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SmartyStrategyFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new SmartyStrategy($serviceLocator->get('SmartyRenderer'));
    }
}
