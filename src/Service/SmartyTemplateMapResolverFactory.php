<?php
namespace ZendSmarty\Service;

use Zend\Mvc\Service\ViewTemplateMapResolverFactory;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Resolver\TemplateMapResolver;
use ZendSmarty\ModuleOptions;

class SmartyTemplateMapResolverFactory extends ViewTemplateMapResolverFactory
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $config ModuleOptions */
        $config = $serviceLocator->get('ZendSmarty\ModuleOptions');

        /* @var $orig TemplateMapResolver */
        $orig = $serviceLocator->get('ViewTemplateMapResolver');

        $suffix = '.' . $config->suffix;
        $len = strlen($suffix);

        $instance = new TemplateMapResolver();

        foreach ($orig->getMap() as $name => $file) {
            if (substr($file, $len) === $suffix) {
                $instance->add($name, $file);
            }
        }

        return $instance;
    }
}
