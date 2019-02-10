<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 30.01.2019
 * Time: 8:15
 */

namespace Tests;

use Core\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private $router;
    public function setUp()
    {
        $this->router = new Router();
    }
    public function testGettingCurrentUrl()
    {
        Router::$requestedUrl = "index";
        $result  = Router::getCurrentUrl();
        $this->assertEquals("index", $result);
    }
}
