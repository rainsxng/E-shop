<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 20:23
 */

namespace components;

use controllers\IndexController;
use \Exception;

class Request
{
    protected $controller = 'index';
    protected $action = 'index';



    public function init() {

        $url =  $_SERVER['REQUEST_URI'];

        $path = explode('/',$url);

        if( count($path) == 3 ) {
            $this->controller = $path[1];
            $this->action = $path[2];
        } elseif ( count($path) == 2 && !empty ( $path[1])) {
            $this->controller = $path[1];
        }

        $Controller =  ucfirst($this->controller) . 'Controller.php';

        $action = 'action' . ucfirst($this->action);
         include getcwd().'\controllers\\'.$Controller;
         $controller = new IndexController();
//        if(class_exists("\controller\\".$classController)) {
//            $instanceController = new $classController;
//            if(method_exists($instanceController,$action)) {
//                call_user_func_array([$instanceController,$action],[]);
//            } else {
//                throw new Exception(' Метод не существует!');
//            }
//        }
        $controller->$action();

    }

}