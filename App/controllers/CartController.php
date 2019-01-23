<?php

namespace Controllers;

use Core\Controller;
use Models\Cart;
use Models\Order;

class CartController extends Controller
{
    private $cartModel;
    private $orderModel;
    public function __construct()
    {
        $this->cartModel = new Cart();
        $this->orderModel = new Order();
    }

    public function getCartProducts()
    {
        $products=$this->cartModel->getProducts();
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
            $this->cartModel->setProductId($_POST['productId']);
            $this->cartModel->setQuantity($_POST['quantity']);
            $this->cartModel->addProduct($this->cartModel);
        }
    }
    public function deleteOne()
    {
        if (isset($_POST['productId'])) {
            $this->cartModel->setProductId($_POST['productId']);
            $this->cartModel->deleteOne($this->cartModel);
        }
    }
    public function deleteAll()
    {
        $this->cartModel->delete();
        $this->orderModel->delete($this->orderModel);
    }
    public function increaseByOne()
    {
        if (isset($_POST['productId'])) {
            $this->cartModel->setProductId($_POST['productId']);
            $this->cartModel->increaseByOne($this->cartModel);
        }
    }
    public function decreaseByOne()
    {
        if (isset($_POST['productId'])) {
            $this->cartModel->setProductId($_POST['productId']);
            $this->cartModel->decreaseByOne($this->cartModel);
        }
    }
}
