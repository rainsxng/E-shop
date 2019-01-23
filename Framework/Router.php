<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 20:23
 */

namespace Core;

class Router
{
    public static $routes = array();
    private static $params = array();
    public static $requestedUrl = '';
    /**
     * Add route
     */
    public static function addRoute($route, $destination=null)
    {
        if ($destination != null && !is_array($route)) {
            $route = array($route => $destination);
        }
        self::$routes = array_merge(self::$routes, $route);
    }
    public function __construct()
    {
        $routes = require_once '../App/config/routes.php';
        self::addRoute($routes);
    }

    /**
     * Split URL on parts
     */
    public static function splitUrl($url)
    {
        return preg_split('/\//', $url, -1, PREG_SPLIT_NO_EMPTY);
    }
    /**
     * Current  URL
     */
    public static function getCurrentUrl()
    {
        return (self::$requestedUrl?:'/');
    }
    /**
     * Dispatching  URL
     */
    public static function dispatch($requestedUrl = null)
    {
        // If there is no URL , take it from REQUEST_URI
        if ($requestedUrl === null) {
            $uri = reset(explode('?', $_SERVER["REQUEST_URI"]));
            $requestedUrl = urldecode(rtrim($uri, '/'));
        }
        self::$requestedUrl = $requestedUrl;
        // if URL and route matches
        if (isset(self::$routes[$requestedUrl])) {
            self::$params = self::splitUrl(self::$routes[$requestedUrl]);
            return self::executeAction();
        }
        foreach (self::$routes as $route => $uri) {
            // Replace wildcards on regular statements
            if (strpos($route, ':') !== false) {
                $route = str_replace(':any', '(.+)', str_replace(':num', '([0-9]+)', $route));
            }
            if (preg_match('#^'.$route.'$#', $requestedUrl)) {
                if (strpos($uri, '$') !== false && strpos($route, '(') !== false) {
                    $uri = preg_replace('#^'.$route.'$#', $uri, $requestedUrl);
                }
                self::$params = self::splitUrl($uri);
                break; // URL dispatched!
            }
        }
        return self::executeAction();
    }
    /**
     * Running the corresponding action
     */
    public static function executeAction()
    {
        $controller = isset(self::$params[0]) ? self::$params[0]: 'Controllers\IndexController';
        $controller = new $controller();
        $action = isset(self::$params[1]) ? self::$params[1]: 'actionIndex';
        $params = array_slice(self::$params, 2);
        return call_user_func_array(array($controller, $action), $params);
    }
    public function returnParams()
    {
        return self::$params;
    }
}
