<?php

namespace Controllers;

use Core\Controller;
use Models\Comment;
use Models\Product;
use Models\ProductModel;

class ProductController extends Controller
{
    private $product;
    private $comment;
    public function __construct()
    {
        $this->product = new Product();
        $this->comment = new Comment();

    }

    public function viewProduct($id)
    {
        $comments = $this->comment->getCommentsForProduct($id);
        $product =  $this->product->getProductById($id);
        if (!empty($product)) {
            self::render(
                 'product',
                ['product'=>$product,'comments'=>$comments,'count'=>Comment::getCount()]
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
