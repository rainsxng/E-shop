<?php

namespace Controllers;

use Core\Controller;
use Models\CartModel;

class CartController extends Controller
{
    public function getCartProducts()
    {
        $model = new CartModel();
        $products=$model->getProducts();
        self::render('cart', ['items'=>$products]);
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
            $model = new CartModel();
            $model->addProduct($_POST['productId'], $_POST['quantity']);
        }
    }
    public function deleteOne()
    {
        if (isset($_POST['productId'])) {
            $model = new CartModel();
            $model->deleteOne($_POST['productId']);
        }
    }
    public function deleteAll()
    {
        $model = new CartModel();
        $model->deleteAll();
    }
    public function increaseByOne()
    {
        if (isset($_POST['productId'])) {
            $model = new CartModel();
            $model->increaseByOne($_POST['productId']);
        }
    }
    public function decreaseByOne()
    {
        if (isset($_POST['productId'])) {
            $model = new CartModel();
            $model->decreaseByOne($_POST['productId']);
        }
    }
}
