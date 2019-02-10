<?php

namespace Controllers;

use Core\Controller;
use Models\Attribute;
use Models\AttributeValue;
use Models\Comment;
use Models\Product;
use Models\ProductModel;
use Validators\ProductValidator;
use Validators\UserValidator;

class ProductController extends Controller
{
    /**
     * @var Product $product
     */
    private $product;
    /**
     * @var Comment $comment
     */
    private $comment;
    /**
     * @var AttributeValue $values
     */
    private $values;
    /**
     * @var Attribute $attributes
     */
    private $attributes;
    public function __construct()
    {
        $this->product = new Product();
        $this->comment = new Comment();
        $this->values = new AttributeValue();
        $this->attributes = new Attribute();
    }

    /**
     * Show all information about selected product
     * @param $id
     * @throws \Exception
     */
    public function viewProduct($id)
    {
        $this->product->setId($id);
        $this->product = ProductValidator::prepare($this->product);
        $comments = $this->comment->getCommentsForProduct($id);
        $product =  $this->product->getProductById($id);
        $this->values->setProductId($id);
        $this->values = $this->values->getAllForProduct($this->values);
        $this->attributes = $this->attributes->getAllAttributes();
        if ((!empty($product)) && $product->isValid($product)) {
            self::render(
                'product',
                [
                    'product'=>$product,
                    'comments'=>$comments,
                    'count'=>Comment::getCount(),
                    'attributes'=>$this->attributes,
                    'values'=>$this->values],
                    $product->getBrand() . ' ' . $product->getName()
            );
        } else {
            self::render('404');
        }
    }

    /**
     * Get all products for chosen category
     * @param $id
     * @throws \Exception
     */
    public function getProductsByCategoryId($id)
    {
        $this->product->setId($id);
        $this->product = ProductValidator::prepare($this->product);
        $products =  $this->product->getProductByCategoryId($id);
        if (!empty($products)) {
            self::render(
                'category',
                ['products'=>$products],
                $products[0]->getCategory()
            );
        } else {
            self::render('404');
        }
    }

    /**
     * Add comment to product
     */
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
