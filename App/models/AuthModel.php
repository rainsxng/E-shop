<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 10.12.18
 * Time: 17:56
 */
namespace Models;
use Core\Model;

class AuthModel extends Model
{
    private $login = 'rainsxng';
    private $pass = '1234';
    public function authorization($login,$pass)
    {
        if ($login == $this->login && $pass == $this->pass) {
            if(!isset($_SESSION)){session_start();}
            $_SESSION['isLogged'] = true;
        } else
            $_SESSION['isLogged'] = false;
        return  $_SESSION['isLogged'];
    }
    public function getLogin(){
        return $this->login;
    }
    public function logOut(){
        $_SESSION['isLogged'] = false;
        session_destroy();
        unset($_SESSION);
    }
    public function getPass(){
        return $this->pass;
    }
}