<?php
namespace ZendSmarty\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Resolver\AggregateResolver;

class SmartyResolverFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $resolver = new AggregateResolver();
        $resolver->attach($serviceLocator->get('SmartyTemplateMapResolver'));
        $resolver->attach($serviceLocator->get('SmartyTemplatePathStack'));
        return $resolver;
    }
}
