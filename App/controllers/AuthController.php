<?php

namespace Controllers;

use Core\Controller;
use Models\User;

class AuthController extends Controller
{
    private $model;
    public function __construct()
    {
        session_start();
        $this->model=new User();
    }

    public function authorize()
    {
        $this->model->authorization($_POST['login'], $_POST['password']);
    }
    public function logOut()
    {
        $this->model->logOut();
    }
    public function getLogin()
    {
        return $_SESSION['login'];
    }
    public function registration()
    {
        $this->model->setLogin($_POST['login']);
        $this->model->setPassword($_POST['password']);
        $login=$_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $this->model->registration($login, $password, $email);
    }
}
