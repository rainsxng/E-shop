<?php

namespace Controllers;

use Core\Controller;
use Models\ProductModel;
use Models\CategoryModel;

class IndexController extends Controller
{
    private $CategoryModel;
    private $ProductModel;
    public function __construct()
    {
        $this->CategoryModel = new CategoryModel();
        $this->ProductModel = new ProductModel();
    }

    public function actionIndex()
    {
        $categories = $this->CategoryModel->getCategories();

        self::render(
            'index',
            $this->ProductModel->getItems(),
            $categories
        );
    }
}
