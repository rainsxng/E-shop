<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:06
 */

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

}