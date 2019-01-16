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
    public function authorization($login,$pass)
    {
        $this->data = $this->mapper->getUser($login);
        if (($login ==  $this->data[0]['login']) && (password_verify($pass,$this->data[0]['password']))) {
            if(!isset($_SESSION)) session_start();
            $_SESSION['isLogged'] = true;
            $_SESSION['user_id'] = $this->data[0]['id'];
            $_SESSION['login'] = $this->data[0]['login'];
        } else
            $_SESSION['isLogged'] = false;
        return  $_SESSION['isLogged'];
    }
    public function getLogin()
    {
       return  $_SESSION['login'];
    }
    public function logOut()
    {
        $_SESSION['isLogged'] = false;
        session_destroy();
        unset($_SESSION);
    }
    public function registration($login,$password,$email)
    {
        if ($this->isUserExists($login)===false)
        $this->mapper->addUser($login,$password,$email);
        else die(header("HTTP/1.0 401"));
    }
    public function isUserExists($login)
    {
        if (!empty($this->mapper->getUser($login))){
            return true;
        }
        else return false;
    }
}