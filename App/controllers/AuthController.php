<?php

namespace Controllers;

use Core\Controller;
use Models\AuthModel;
use Models\User;
use phpDocumentor\Reflection\Types\Self_;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->model=new User();
    }
    private $model;


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
        $this->model->registration($_POST['login'], $_POST['password'], $_POST['email']);
    }
}
