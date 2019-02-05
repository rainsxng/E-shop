<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 30.01.2019
 * Time: 8:15
 */

namespace Tests;

use Controllers\IndexController;
use PHPUnit\Framework\TestCase;

class IndexControllerTest extends TestCase
{
    /**
     * @var IndexController
     */
    private $controller;

    public function setUp()
    {
        $this->controller = new IndexController();
    }

    public function testIndexAction()
    {
        $this->assertIsBool($this->controller->actionIndex());
    }

}
