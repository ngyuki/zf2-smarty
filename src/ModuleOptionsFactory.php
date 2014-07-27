<?php
namespace ZendSmarty;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Hydrator\Reflection;

class ModuleOptionsFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $appConfig = $serviceLocator->get('Config');
        $moduleOptions = new ModuleOptions();

        if (isset($appConfig['smarty']) && is_array($appConfig['smarty'])) {
            $hyd = new Reflection();
            $hyd->hydrate($appConfig['smarty'], $moduleOptions);
        }

        return $moduleOptions;
    }
}
