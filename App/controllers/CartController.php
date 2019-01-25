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
            $this->cartModel->addProduct($_POST['productId']);
        }
    }
    public function deleteOne()
    {
        if (isset($_POST['productId'])) {
            $this->cartModel->deleteOne($_POST['productId']);
        }
    }
    public function deleteAll()
    {
        $this->cartModel->deleteAll();
        $this->orderModel->delete();
    }
    public function increaseByOne()
    {
        if (isset($_POST['productId'])) {
            $this->cartModel->increaseByOne($_POST['productId']);
        }
    }
    public function decreaseByOne()
    {
        if (isset($_POST['productId'])) {
            $this->cartModel->decreaseByOne($_POST['productId']);
        }
    }
}
