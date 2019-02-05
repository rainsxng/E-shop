<?php
namespace Core;

use Logger\LoggerClass;

class App
{
    /**
     * @var $route
     */
    public $route=null;
    public function __construct()
    {
        if (isset($_COOKIE['PHPSESSID'])) {
            @session_start();
        }
        /**
         * Setting log file
         */
        $logger = new LoggerClass();
        $logger->setLogFile('../App/logs/log.log');
        $logger->registerFatalHandler();
        $logger->registerExceptionHandler();
        $logger->registerErrorHandler([], false);
        $router = new Router();
        $router::dispatch();
    }
}
