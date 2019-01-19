<?php

namespace Controllers;

use Core\Controller;
use Models\Category;
use Models\ProductModel;
use Models\CategoryModel;

class IndexController extends Controller
{
    private $CategoryModel;
    private $ProductModel;
    public function __construct()
    {
        $this->CategoryModel = new Category();
        $this->ProductModel = new ProductModel();
    }

    public function actionIndex()
    {
        $categories = $this->CategoryModel->getAllCategories();
        $products = $this->ProductModel->getItems();
        return self::render(
            'index',
            ['items'=>$products,'categories'=>$categories]
        );
    }
}
