<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:06
 */

namespace controllers;


use components\Controller;
use models\Product;
include_once 'Controller.php';

class IndexController extends Controller
{
    public function actionIndex() {
        $ProductModel = new Product();

        $this->render ('views/index.php',
            $ProductModel->getItems());
    }

}