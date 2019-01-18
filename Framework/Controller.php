<?php

namespace Core;
use Twig_Loader_Filesystem;
use Twig_Environment;
class Controller
{
    public function render($viewName, $items = null, $categories = null)
    {
        $loader = new Twig_Loader_Filesystem('../App/views/');
        $twig = new Twig_Environment($loader);
        echo $twig->render('index.php',['items'=>$items,'categories'=>$categories]);
    }
}
