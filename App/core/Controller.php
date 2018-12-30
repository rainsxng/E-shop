<?php

namespace Core;


class Controller
{
    public function render($view, $items = null) {
        require $view;
    }
}