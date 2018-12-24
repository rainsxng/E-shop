<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 21:06
 */

namespace controllers;


use core\Controller;
use models\Product;

class IndexController extends Controller
{
    public function actionIndex() {
        $ProductModel = new Product();

        self::render ('views/index.php',
            $ProductModel->getItems());
    }
    public function showCatalog(){
        self::render('views/category.php');
    }
    public function showLoginPAge() {
        self::render ('views/login.php');
    }
    public function showRegisterPAge() {
        self::render ('views/register.php');
    }

}