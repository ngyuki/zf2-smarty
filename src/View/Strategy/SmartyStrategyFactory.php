<?php
namespace ZendSmarty\View\Strategy;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SmartyStrategyFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new SmartyStrategy($serviceLocator->get('SmartyRenderer'));
    }
}
