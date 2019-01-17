<?php


namespace Controllers;

use Core\Controller;
use Mappers\ProductMapper;

class ShowController extends Controller
{
    public function showLoginPAge()
    {
        self::render('../App/views/login.php');
    }
    public function showRegisterPAge()
    {
        self::render('../App/views/register.php');
    }
    public function showCart()
    {
        self::render('../App/views/cart.php');
    }
    public function showConnect()
    {
        $mapper = new ProductMapper();
        $mapper->getAllProducts();
    }
}
