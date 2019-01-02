<?php
namespace Core;
use Logger\LoggerClass;
use mysql_xdevapi\Exception;

class App
{
    public $route=null;
    public function  __construct()
    {
        $logger = new LoggerClass();
        $logger->setLogFile('log.log');
        $logger->registerFatalHandler();
        $logger->registerExceptionHandler();
        $logger->registerErrorHandler([],false);
        $router = new Request();
        $router::dispatch();
    }
}