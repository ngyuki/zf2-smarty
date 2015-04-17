<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        if ($this->params("json", false)) {
            return new JsonModel(array(
                'name' => 'this is json model',
            ));
        } else {
            return array(
                'value' => '<script>alert("!!!")</script>',
                'html' => '<strong>The strong string</strong>',
            );
        }
    }
}
