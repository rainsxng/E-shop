<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 19.01.2019
 * Time: 17:43
 */

namespace Models;

use Core\Model;
use Validators\UserValidator;
use Mappers\UserMapper;
use Core\Response;

class User extends Model
{
    protected $id;
    protected $password;
    protected $login;
    protected $email;
    protected $user;
    protected $mapper;

    public function __construct()
    {
        parent::__construct();
        $this->mapper = new UserMapper();
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
        $this->user = new User();
        $this->user = clone $this->mapper->getUserByLogin($login);
        if (($login == $this->user->getLogin()) && (password_verify($pass, $this->user->getPassword()))) {
            $_SESSION['isLogged'] = true;
            $_SESSION['user_id'] = $this->user->getId();
            $_SESSION['login'] = $this->user->getLogin();
        } else {
            $_SESSION['isLogged'] = false;
        }
        echo json_encode($_SESSION['isLogged']);
        return $_SESSION['isLogged'];
    }

    public function logOut()
    {
        $_SESSION = [];
        $_SESSION['isLogged'] = false;
        echo json_encode($_SESSION['isLogged']);
    }

    public function registration(User $user)
    {
        if ($this->isUserExists($user->getLogin()) === false) {
            if ($this->mapper->addUser($user)) {
                Response::setResponseCode(200);
                Response::setContent("Успешно зарегистрирован", "");
                Response::send();
            }
        } else {
            Response::setResponseCode(401);
            Response::setContent("Такой пользователь уже существует", "");
            Response::send();
        }
    }

    public function isUserExists($login)
    {

        $user = $this->mapper->getUserByLogin($login);
        if (!($user->getId() === null)) {
            return true;
        } else {
            return false;
        }
    }

    public function fromArray($data)
    {
        $this->setId($data['id']);
        $this->setLogin($data['login']);
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setCreatedAt($data['created_at']);
        $this->setUpdatedAt($data['updated_at']);
    }

    public function getUserById($id)
    {
        $this->user = $this->mapper->getUserById($id);
        return $this->user;
    }

    public function prepare(User $obj)
    {

        $obj = UserValidator::prepare($obj);
        return $obj;
    }

    public function isValidForRegister(User $obj)
    {
        if (UserValidator::validateLogin($obj->getLogin())
            && UserValidator::validateEmail($obj->getEmail())
            && UserValidator::validatePassword($obj->getPassword())) {
            return true;
        }
        else {
            return false;
        }
    }

    public function isValidForLogin(User $obj)
    {
        if (UserValidator::validateLogin($obj->getLogin())
            && UserValidator::validatePassword($obj->getPassword())) {
            return true;
        }
        else {
            return false;
        }
    }

    public function changePassword(User $obj)
    {
        return $this->mapper->changePassword($obj);
    }
}
