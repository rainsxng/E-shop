<?php

namespace Controllers;
use Core\Controller;
use Models\AuthModel;
class AuthController extends Controller
{
    public static $model;
    public function __construct()
    {
        self::$model=  new AuthModel();
    }

    public  function authorize()
    {
       self::$model->authorization($_POST['loginText'], $_POST['pswdText']);
    }
    public function logOut()
    {
        self::$model->logOut();
    }
    public function getLogin(){
        return self::$model->getLogin();
    }

}