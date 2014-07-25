<?php
namespace ZendSmarty\View\Strategy;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\View\ViewEvent;

use ZendSmarty\View\Renderer\SmartyRenderer;

class SmartyStrategy extends AbstractListenerAggregate
{
    /**
     * @var SmartyRenderer
     */
    protected $renderer;

    /**
     * @param SmartyRenderer $renderer
     */
    public function __construct(SmartyRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events, $priority = 100)
    {
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RENDERER, array($this, 'selectRenderer'), $priority);
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RESPONSE, array($this, 'injectResponse'), $priority);
    }

    /**
     * @param  ViewEvent $ev
     * @return SmartyRenderer
     */
    public function selectRenderer(ViewEvent $ev)
    {
        if ($this->renderer->canRender($ev->getModel())) {
            return $this->renderer;
        } else {
            return null;
        }
    }

    /**
     * @param ViewEvent $ev
     * @return void
     */
    public function injectResponse(ViewEvent $ev)
    {
        if ($ev->getRenderer() === $this->renderer) {
            $result = $ev->getResult();
            $response = $ev->getResponse();
            $response->setContent($result);
        }
    }
}
