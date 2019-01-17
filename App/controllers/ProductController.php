<?php

namespace Controllers;

use Core\Controller;
use Models\ProductModel;

class ProductController extends Controller
{
    private $product;
    public function __construct()
    {
        $this->product = new ProductModel();
    }
    public function render($view, $items = null, $categories = null)
    {
        parent::render($view, $items, $categories);
    }

    public function viewProduct($id)
    {
        $comments = $this->product->getCommentsForProduct($id);
        $products =  $this->product->getItemById($id);
        if (!empty($products)) {
            if (!empty($comments)) {
                $products[0]['comments']=$comments;
            }
            self::render(
                 '../App/views/product.php',
                $products
             );
        } else {
            self::render('../App/views/404.php');
        }
    }

    public function getProductsByCategoryId($id)
    {
        $products =  $this->product->getProductsByCategoryId($id);
        if (!empty($products)) {
            self::render(
                '../App/views/category.php',
               $products
            );
        } else {
            self::render('../App/views/404.php');
        }
    }
}
