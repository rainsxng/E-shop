<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:06
 */

namespace controllers;


use Core\Controller;
use Models\Product;

class AuthController extends Controller
{
    public function showLoginPAge() {
        self::render ('views/login.php');
    }
    public function showRegisterPAge() {
        self::render ('views/register.php');
    }

}