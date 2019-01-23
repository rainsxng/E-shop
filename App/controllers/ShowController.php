<?php


namespace Controllers;

use Core\Controller;
use Mappers\ProductMapper;

class ShowController extends Controller
{
    public function showLoginPAge()
    {
        return self::render('login');
    }
    public function showRegisterPAge()
    {
        self::render('register');
    }
    public function showCart()
    {
        self::render('cart');
    }
}
