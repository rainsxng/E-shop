<?php

namespace Controllers;

use Core\Controller;
use Models\Attribute;
use Models\Attribute_value;
use Models\Comment;
use Models\Product;
use Models\ProductModel;

class ProductController extends Controller
{
    private $product;
    private $comment;
    private $values;
    private $attributes;
    public function __construct()
    {
        $this->product = new Product();
        $this->comment = new Comment();
        $this->values = new Attribute_value();
        $this->attributes = new Attribute();
    }

    public function viewProduct($id)
    {
        $comments = $this->comment->getCommentsForProduct($id);
        $product =  $this->product->getProductById($id);
        $this->values->setProductId($id);
        $this->values = $this->values->getAllForProduct($this->values);
        $this->attributes = $this->attributes->getAllAttributes();
        if (!empty($product)) {
            self::render(
                'product',
                [
                    'product'=>$product,
                    'comments'=>$comments,
                    'count'=>Comment::getCount(),
                    'attributes'=>$this->attributes,
                    'values'=>$this->values]
            );
        } else {
            self::render('404');
        }
    }

    public function getProductsByCategoryId($id)
    {
        $products =  $this->product->getProductByCategoryId($id);
        if (!empty($products)) {
            self::render(
                'category',
                ['products'=>$products]
            );
        } else {
            self::render('404');
        }
    }
    public function addComment()
    {
        $this->comment->setProductId($_POST['product_id']);
        $this->comment->setUserId($_POST['user_id']);
        $this->comment->setMessage($_POST['message']);
        $this->comment->setStars($_POST['stars']);
        $this->comment->setDate(date('Y-m-d'));
        $this->comment->add($this->comment);
    }
}
