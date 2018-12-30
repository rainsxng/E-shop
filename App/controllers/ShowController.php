<?php


namespace Controllers;


use Core\Controller;
use Models\Product;

class ShowController extends Controller
{
    public function showLoginPAge() {
        self::render ('../App/views/login.php');
    }
    public function showRegisterPAge() {
        self::render ('../App/views/register.php');
    }
    public function showCart() {
        self::render ('../App/views/cart.php');
    }

}