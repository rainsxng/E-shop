<?php

namespace Controllers;
use Core\Controller;
use Models\ProductModel;

class ProductController extends Controller
{
    public function viewProduct($id)
    {
        $product = new ProductModel();
        $products = $product->getItemById($id);
        if (!empty($products)) {
            self::render('../App/views/product.php',
                $product->getItemById($id));
        }
        else {
            self::render('../App/views/404.php');
        }
    }

    public function getProductsByCategoryId($id)
    {
        $product = new ProductModel();
        $products = $product->getProductsByCategoryId($id);
        if (!empty($products)) {
            self::render('../App/views/category.php',
               $products);
        }
        else {
            self::render('../App/views/404.php');
        }
    }

}