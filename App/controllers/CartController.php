<?php

namespace Controllers;

use Core\Controller;
use Models\Cart;
use Models\Order;
use Core\Response;

class CartController extends Controller
{
    /**
     * @var Cart $cartModel Cart
     */
    private $cartModel;
    /**
     * @var Order
     */
    private $orderModel;
    public function __construct()
    {
        $this->cartModel = new Cart();
        $this->orderModel = new Order();
    }

    /**
     * Get cart products for current user
     * @throws \Exception
     */
    public function getCartProducts()
    {
        $products=$this->cartModel->getProducts();
        self::render('cart', ['products'=>$products,'sum'=>Cart::getSum()]);
    }

    /**
     * Add product to the cart
     */
    public function addToCart()
    {
        if (isset($_POST['quantity']) && !($_POST['quantity']>=1)) {
            Response::setResponseCode(400);
            Response::send();
            return;
        }
        if (!isset($_SESSION['user_id'])) {
            Response::setResponseCode(300);
            Response::send();
            return;
        }
        if (isset($_POST['productId'])) {
            $this->cartModel->addProduct($_POST['productId'], $_POST['quantity']);
        }
    }

    /**
     * Delete product from the cart
     */
    public function deleteOne()
    {
        if (isset($_POST['productId'])) {
            $this->cartModel->deleteOne($_POST['productId']);
        }
    }

    /**
     * Delete all products from the cart
     */
    public function deleteAll()
    {
        $this->cartModel->deleteAll();
        $this->orderModel->delete();
    }

    /**
     * Increase product quantity in cart by one
     */
    public function increaseByOne()
    {
        if (isset($_POST['productId'])) {
            $this->cartModel->increaseQuantity($_POST['productId'], 1);
        }
    }
    /**
     * Decrease product quantity in cart by one
     */
    public function decreaseByOne()
    {
        if (isset($_POST['productId'])) {
            $this->cartModel->decreaseQuantity($_POST['productId'], 1);
        }
    }

    /**
     * Checkout an order
     */
    public function makeOrder()
    {
        if (isset($_SESSION['user_id'])) {
            $this->orderModel->setUserId($_SESSION['user_id']);
            $this->orderModel->setStatus('order');
            $this->cartModel->makeOrder($this->orderModel);
        }
    }
}
