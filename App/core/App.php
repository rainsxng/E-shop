<?php
namespace Core;
use Logger\LoggerClass;

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
        $wrapper = new DBWrapper();
        $router = new Request();
        $router::dispatch();
    }
}