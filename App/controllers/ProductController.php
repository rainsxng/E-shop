<?php

namespace Controllers;
use Core\Controller;
use Models\Product;

class ProductController extends Controller
{

    public function viewProduct($id) {
        $ProductModel = new Product();
        self::render ('../App/views/product.php',
            $ProductModel->getItemById($id));
    }

}