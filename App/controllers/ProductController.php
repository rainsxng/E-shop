<?php

namespace Controllers;
use Core\Controller;
use Models\Product;

class ProductController extends Controller
{
    private static $ProductModel;
    public function __construct()
    {
        self::$ProductModel = new Product();
    }

    public function viewProduct($id)
    {
        self::render ('../App/views/product.php',
            self::$ProductModel->getItemById($id));
    }
    public function getProductsByCategoryId($id)
    {
        $product = new Product();
        self::render('../App/views/category.php',
            $product->getProductsByCategoryId($id));
    }

}