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
        self::render('../App/views/cart.php',$products);
    }
}