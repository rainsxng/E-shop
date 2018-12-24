<?php

namespace core;


class Controller
{
    public function render($view, $items = null) {
        require $view;
    }
}