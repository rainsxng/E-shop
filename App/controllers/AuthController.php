<?php

namespace Controllers;
use Core\Controller;
use Models\AuthModel;
use phpDocumentor\Reflection\Types\Self_;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->model=new AuthModel();
    }
    private $model;


    public  function authorize()
    {
        $this->model->authorization($_POST['login'], $_POST['password']);
    }
    public function logOut()
    {
        $this->model->logOut();
    }
    public function getLogin()
    {
        return $this->model->getLogin();
    }
    public function registration()
    {
        $this->model->registration($_POST['login'],$_POST['password'],$_POST['email']);

    }

}