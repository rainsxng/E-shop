<?php

namespace Controllers;

use Core\Controller;
use Models\Category;
use Models\Product;
use Models\ProductModel;
use Models\CategoryModel;

class IndexController extends Controller
{
    private $CategoryModel;
    private $ProductModel;
    public function __construct()
    {
        $this->CategoryModel = new Category();
        $this->ProductModel = new Product();
    }

    public function actionIndex()
    {
        $categories = $this->CategoryModel->getAllCategories();
        $products = $this->ProductModel->getAllProducts();
        return self::render(
            'index',
            ['items'=>$products,'categories'=>$categories]
        );
    }
}
