<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 19.12.2018
 * Time: 7:44
 */
namespace core;
use core\Request;
class App
{
    public $route=null;
    public function  __construct()
    {
        $router = new Request();
        $router->init();
    }
}