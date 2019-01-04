<?php

namespace Controllers;


use Core\Controller;
use Models\Product;
use Models\CategoryModel;


class IndexController extends Controller
{
    public function actionIndex() {
        $CategoryModel = new CategoryModel();
        $categories = $CategoryModel->getCategories();
        $ProductModel = new Product();
        self::render ('../App/views/index.php',
            $ProductModel->getItems(),$categories);
    }

}