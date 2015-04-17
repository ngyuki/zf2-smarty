<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return array(
            'value' => '<script>alert("!!!")</script>',
            'html' => '<strong>The strong string</strong>',
        );
    }

    public function jsonAction()
    {
        return new JsonModel(array(
            'name' => 'this is json',
        ));
    }
}
