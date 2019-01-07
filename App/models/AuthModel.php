<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 10.12.18
 * Time: 17:56
 */
namespace Models;
use Core\Model;
use Mappers\UsersMapper;
class AuthModel extends Model
{
    public function __construct()
    {
        $this->mapper = new UsersMapper();
    }

    private $mapper;
    private $data;
    private static $loginOutput;
    public function authorization($login,$pass)
    {
        $this->data = $this->mapper->getUser($login,$pass);
        if ($login ==  $this->data[0]['login'] && $pass ==  $this->data[0]['password']) {
            self::$loginOutput= $this->data[0]['login'];
            if(!isset($_SESSION)){session_start();}
            $_SESSION['isLogged'] = true;
        } else
            $_SESSION['isLogged'] = false;
        return  $_SESSION['isLogged'];
    }
    public function getLogin(){
       return  self::$loginOutput;
    }
    public function logOut(){
        $_SESSION['isLogged'] = false;
        session_destroy();
        unset($_SESSION);
    }
    public function registration($login,$password,$email)
    {
        $this->mapper->addUser($login,$password,$email);
    }
}