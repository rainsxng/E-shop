<?php

namespace Core;


class Controller
{
    public function render($view, $items = null,$categories = null) {
        require $view;
    }
}