<?php


namespace Controllers;

use Core\Controller;
use Mappers\ProductMapper;

class ShowController extends Controller
{
    public function showLoginPAge()
    {
        return self::render('login',null,"Страница входа");
    }
    public function showRegisterPAge()
    {
        self::render('register',null,"Страница регистрации");
    }
    public function showCart()
    {
        self::render('cart',null,"Корзина");
    }
}
