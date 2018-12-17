<?php
class Router
{
    protected static $controller_name = "Main";
    protected static $action_name = "index";

    public function route()
    {
//        $routes = explode('/', $_SERVER['REQUEST_URI']);
//        if ( !empty($routes[1]) )
//        		{
//        			$controller_name = $routes[3];
//        		}
//              if ( !empty($routes[4]))
//              		{
//        				$action_name = $routes[4];
//            		}
//              $model_name = $controller_name.'Model';
//              $controller_name = $controller_name.'Controller';
//              $action_name=$action_name.'Action';
//              $model_file =   strtolower($model_name).'.php';
//              $model_path = "app/models/".$model_file;
//              var_dump($model_path);
//              $controller_file = strtolower($controller_name).'.php';
//              $controller_path = "app/controllers/".$controller_file;
//              if(file_exists($controller_path))
//                 {
//            include "app/controllers/".$controller_file;
//                  }
//        $controller = new $controller_name;
//        $action = $action_name;
//        if(method_exists($controller, $action))
//        {
//
//            $controller->$action();
//        }
//        else
//        {
//            // здесь также разумнее было бы кинуть исключение
//            echo "Метода не существует";
//        }


        switch ($_GET['page']) {
            case "product" :
                require_once("./views/product/product.php"); // страница "Контакты"
                break;
            default :
                require_once("./views/index/index.php"); // страница "404"
                break;
        }

    }
}
