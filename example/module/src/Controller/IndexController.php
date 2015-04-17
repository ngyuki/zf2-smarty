<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use ZendSmarty\View\SmartyRenderer;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $view = new ViewModel();
        $view->setTemplate('smarty/sample.tpl');
        $view->setVariables(array('value' => 'abc'));

        /* @var $viewRender SmartyRenderer */
        $viewRender = $this->getServiceLocator()->get('SmartyRenderer');
        $xml        = $viewRender->render($view);
        var_dump($xml);

        return new ViewModel();
    }
}
