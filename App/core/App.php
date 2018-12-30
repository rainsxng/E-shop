<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 19.12.2018
 * Time: 7:44
 */
namespace Core;

class App
{
    public $route=null;
    public function  __construct()
    {
        $router = new Request();
        $routes = array(
            // 'url' => 'контроллер/действие/параметр1/параметр2/параметр3'
            '/' => 'controllers\IndexController/actionIndex', // главная страница
            '/product/:num' => 'controllers\ProductController/viewProduct/$1',
            '/login'=>'controllers\AuthController/showLoginPage',
            '/register'=>'controllers\AuthController/showRegisterPage'
);
        $router::addRoute($routes);
        $router::dispatch();
    }
}