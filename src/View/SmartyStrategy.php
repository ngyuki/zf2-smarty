<?php
namespace ZendSmarty\View;

use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\View\Model;
use Zend\View\ViewEvent;

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
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RENDERER, [$this, 'selectRenderer'], $priority);
        $this->listeners[] = $events->attach(ViewEvent::EVENT_RESPONSE, [$this, 'injectResponse'], $priority);
    }

    /**
     * @param  ViewEvent $ev
     * @return SmartyRenderer
     */
    public function selectRenderer(ViewEvent $ev)
    {
        $model = $ev->getModel();

        // this case needs special checking, as JsonModel is a subclass of
        // ViewModel
        if ($model instanceof Model\JsonModel) {
            // JsonModel; do nothing
            return;
        }

        if (!$model instanceof Model\ViewModel) {
            // no ViewModel; do nothing
            return;
        }

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
            $result   = $ev->getResult();
            $response = $ev->getResponse();
            $response->setContent($result);
        }
    }
}
