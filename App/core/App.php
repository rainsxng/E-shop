<?php
namespace Core;
use Logger\LoggerClass;

class App
{
    public $route=null;
    public function  __construct()
    {
        if (isset($_COOKIE['PHPSESSID'])){
            session_start();
        }
        $logger = new LoggerClass();
        $logger->setLogFile('log.log');
        $logger->registerFatalHandler();
        $logger->registerExceptionHandler();
        $logger->registerErrorHandler([],false);
        $mapper = new Mapper();
        $router = new Request();
        $router::dispatch();
    }
}