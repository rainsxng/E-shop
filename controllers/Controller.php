<?php

namespace components;


class Controller
{
    public function render($view, $items) {
        require "$view";
    }
}