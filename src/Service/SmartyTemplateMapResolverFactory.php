<?php
namespace ZendSmarty\Service;

use Zend\Mvc\Service\ViewTemplateMapResolverFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Resolver\TemplateMapResolver;

class SmartyTemplateMapResolverFactory extends ViewTemplateMapResolverFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $orig TemplateMapResolver */
        $orig = $serviceLocator->get('ViewTemplateMapResolver');

        $instance = new TemplateMapResolver();

        foreach ($orig->getMap() as $name => $file) {
            if (substr($file, -4) === '.tpl') {
                $instance->add($name, $file);
            }
        }

        return $instance;
    }
}
