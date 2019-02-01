<?php

namespace Core;


class Controller
{
    public function render($viewName, $data = null)
    {
        $path = '../App/views/' . $viewName . ".php";
        if (!file_exists($path)) {
            throw new \Exception("View file {$path} dont exist.");
        }
        ob_start();
        extract($data, EXTR_OVERWRITE);
        require $path;
        return ob_end_flush();
    }
}
