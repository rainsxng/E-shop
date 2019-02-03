<?php


namespace Controllers;

use Core\Controller;
use Mappers\ProductMapper;

class ShowController extends Controller
{
    /**
     * Show Login page
     * @return bool
     * @throws \Exception
     */
    public function showLoginPAge()
    {
        return self::render('login', null);
    }

    /**
     * Show register page
     * @throws \Exception
     */
    public function showRegisterPAge()
    {
        self::render('register', null);
    }

    /**
     * Show cart page
     * @throws \Exception
     */
    public function showCart()
    {
        self::render('cart', null);
    }
}
