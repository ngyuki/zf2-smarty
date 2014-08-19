<?php
namespace Test\Controller;

class IndexControllerTest extends \Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase
{
    protected $traceError = true;

    protected function setUp()
    {
        $this->setApplicationConfig(require APP_CONFIG);
        parent::setUp();
    }

    /**
     * @test
     */
    function index_()
    {
        $this->dispatch('/');

        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Application');
        $this->assertControllerName('Application\Controller\Index');
        $this->assertControllerClass('IndexController');
        $this->assertActionName('index');
    }
}
