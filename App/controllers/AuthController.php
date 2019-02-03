<?php

namespace Controllers;

use Core\Controller;
use Models\User;

class AuthController extends Controller
{
    /**
     * @var User $model User
     */
    private $model;
    public function __construct()
    {
        session_start();
        $this->model=new User();
    }

    /**
     * Authorize user via login and password
     */
    public function authorize()
    {
        $this->model->setLogin($_POST['login']);
        $this->model->setPassword($_POST['password']);
        if ($this->model->isValidForLogin($this->model))
        {
            $this->model->authorization($_POST['login'], $_POST['password']);
        }
    }

    /**
     * Logout from user account
     */
    public function logOut()
    {
        $this->model->logOut();
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $_SESSION['login'];
    }

    /**
     * User registration via login, email , password
     */
    public function registration()
    {
        $this->model->setLogin($_POST['login']);
        $this->model->setPassword($_POST['password']);
        $this->model->setEmail($_POST['email']);
        $this->model = $this->model->prepare($this->model);
        if ($this->model->isValidForRegister($this->model)) {
            $this->model->registration($this->model);
        }
    }
}
