<?php

namespace Controllers;


use Core\Controller;
use Models\Product;

class IndexController extends Controller
{
    public function actionIndex() {
        $ProductModel = new Product();
        self::render ('../App/views/index.php',
            $ProductModel->getItems());
    }

}