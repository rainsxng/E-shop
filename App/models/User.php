<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 19.01.2019
 * Time: 17:43
 */

namespace Models;


use Mappers\UsersMapper;

class User
{
    private $id;
    private $password;
    private $login;
    private $email;
    private $field;
    private $user;
    private $mapper;
    public function __construct()
    {
        $this->mapper = new UsersMapper();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function authorization($login, $pass)
    {
        $this->user  = new User();
        $this->user = clone $this->mapper->getUser($login);
        if (($login ==  $this->user->getLogin()) && (password_verify($pass, $this->user->getPassword()))) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['isLogged'] = true;
            $_SESSION['user_id'] = $this->user->getId();
            $_SESSION['login'] = $this->user->getLogin();
        } else {
            $_SESSION['isLogged'] = false;
        }
        return  $_SESSION['isLogged'];
    }
    public function logOut()
    {
        $_SESSION['isLogged'] = false;
        session_destroy();
        unset($_SESSION);
    }
    public function registration($login, $password, $email)
    {
        if ($this->isUserExists($login)===false) {
            $this->mapper->addUser($login, $password, $email);
        } else {
           header("HTTP/1.0 401");
        }
    }
    public function isUserExists($login)
    {
        if (!empty($this->mapper->getUser($login))) {
            return true;
        } else {
            return false;
        }
    }
    public function fromArray($data){
        $this->setId($data['id']);
        $this->setLogin($data['login']);
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
    }

}