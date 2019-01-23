<?php

namespace Controllers;

use Core\Controller;
use Models\Cart;

class CartController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Cart();
    }

    public function getCartProducts()
    {
        $products=$this->model->getProducts();
        self::render('cart', ['products'=>$products,'sum'=>Cart::getSum()]);
    }
    public function addToCart()
    {
        if (isset($_POST['quantity']) && !($_POST['quantity']>=1)) {
            die(header("HTTP/1.0 400"));
        }
        if (!isset($_SESSION['user_id'])) {
            die(header("HTTP/1.0 300"));
        }
        if (isset($_POST['productId'])) {
            $this->model->setProductId($_POST['productId']);
            $this->model->setQuantity($_POST['quantity']);
            $this->model->addProduct($this->model);
        }
    }
    public function deleteOne()
    {
        if (isset($_POST['productId'])) {
            $this->model->setProductId($_POST['productId']);
            $this->model->deleteOne($this->model);
        }
    }
    public function deleteAll()
    {
        $this->model->deleteAll();
    }
    public function increaseByOne()
    {
        if (isset($_POST['productId'])) {
            $this->model->setProductId($_POST['productId']);
            $this->model->increaseByOne($this->model);
        }
    }
    public function decreaseByOne()
    {
        if (isset($_POST['productId'])) {
            $this->model->setProductId($_POST['productId']);
            $this->model->decreaseByOne($this->model);
        }
    }
}
