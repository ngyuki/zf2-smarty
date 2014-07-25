<?php
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return array(
            'value' => '<script>alert("!!!")</script>',
            'html' => '<strong>The strong string</strong>'
        );
    }
}
