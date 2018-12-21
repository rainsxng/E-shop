<?php

namespace core;


class Controller
{
    public function render($view, $items) {
        require $view;
    }
}