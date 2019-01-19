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

    public function viewProduct($id)
    {
        $comments = $this->product->getCommentsForProduct($id);
        $product =  $this->product->getItemById($id);
        if (!empty($product)) {
            self::render(
                 'product',
                ['product'=>$product,'comments'=>$comments]
             );
        } else {
            self::render('404');
        }
    }

    public function getProductsByCategoryId($id)
    {
        $products =  $this->product->getProductsByCategoryId($id);
        if (!empty($products)) {
            self::render(
                'category',
               ['items'=>$products]
            );
        } else {
            self::render('404');
        }
    }
}
