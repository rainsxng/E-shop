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
            '/' => 'Controllers\IndexController/actionIndex', // главная страница
            '/product/:num' => 'Controllers\ProductController/viewProduct/$1',
            '/login'=>'Controllers\ShowController/showLoginPage',
            '/register'=>'Controllers\ShowController/showRegisterPage'
);
        $router::addRoute($routes);
        $router::dispatch();
    }
}