<?php

namespace Controllers;


use Core\Controller;
use Models\ProductModel;
use Models\CategoryModel;


class IndexController extends Controller
{
    public function actionIndex() {
        $CategoryModel = new CategoryModel();
        $categories = $CategoryModel->getCategories();
        $ProductModel = new ProductModel();
        self::render ('../App/views/index.php',
            $ProductModel->getItems(),$categories);
    }

}