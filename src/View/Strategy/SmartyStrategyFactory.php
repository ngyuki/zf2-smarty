<?php
namespace ZendSmarty\View\Strategy;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Resolver\AggregateResolver;
use Zend\View\Resolver\TemplateMapResolver;
use Zend\View\Resolver\TemplatePathStack;
use Zend\View\HelperPluginManager;
use Zend\Stdlib\Hydrator\Reflection;

use ZendSmarty\View\Renderer\SmartyRenderer;

class SmartyStrategyFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $this->createConfig($serviceLocator);
        $resolver = $this->createResolver($serviceLocator);

        /* @var HelperPluginManager $helpers */
        $helpers = $serviceLocator->get('ViewHelperManager');

        $renderer = new SmartyRenderer($config, $helpers);
        $renderer->setResolver($resolver);

        return new SmartyStrategy($renderer);
    }

    private function createConfig(ServiceLocatorInterface $serviceLocator)
    {
        $appConfig = $serviceLocator->get('Config');
        $smartyConfig = new SmartyConfig();

        if (isset($appConfig['smarty']) && is_array($appConfig['smarty'])) {
            $hyd = new Reflection();
            $hyd->hydrate($appConfig['smarty'], $smartyConfig);
        }

        return $smartyConfig;
    }

    private function createResolver(ServiceLocatorInterface $serviceLocator)
    {
        $pathStack = $this->createTemplatePathStack($serviceLocator);
        $mapResolver = $this->createTemplateMapResolver($serviceLocator);

        $resolver = new AggregateResolver();
        $resolver->attach($pathStack);
        $resolver->attach($mapResolver);

        return $resolver;
    }

    private function createTemplatePathStack(ServiceLocatorInterface $serviceLocator)
    {
        /* @var $orig TemplatePathStack */
        $orig = $serviceLocator->get('ViewTemplatePathStack');

        $instance = new TemplatePathStack();
        $instance->addPaths($orig->getPaths()->toArray());
        $instance->setDefaultSuffix('tpl');

        return $instance;
    }

    private function createTemplateMapResolver(ServiceLocatorInterface $serviceLocator)
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
