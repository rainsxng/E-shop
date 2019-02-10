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
    public function __construct()
    {
        parent::__construct();
        $this->mapper = new UserMapper();
    }
    /**
     * @var $id
     */
    protected $id;
    /**
     * @var $password
     */
    protected $password;
    /**
     * @var $login
     */
    protected $login;
    /**
     * @var $email
     */
    protected $email;
    /**
     * @var $user
     */
    protected $user;
    /**
     * @var UserMapper
     */
    protected $mapper;
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

    /**
     * User authorization via login and password
     * @param $login
     * @param $pass
     * @return bool
     */
    public function authorization($login, $pass) :bool
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

    /**
     *Logout from user account
     */
    public function logOut()
    {
        $_SESSION = [];
        $_SESSION['isLogged'] = false;
        echo json_encode($_SESSION['isLogged']);
    }

    /**
     * User registration
     * @param User $user
     */
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

    /**
     * Check is user exist in database
     * @param $login
     * @return bool
     */
    public function isUserExists($login) :bool
    {

        $user = $this->mapper->getUserByLogin($login);
        if (!($user->getId() === null)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Transform an array into an User Object
     * @param $data
     */
    public function fromArray($data)
    {
        $this->setId($data['id']);
        $this->setLogin($data['login']);
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setCreatedAt($data['created_at']);
        $this->setUpdatedAt($data['updated_at']);
    }

    /**
     * Get all user info by id
     * @param $id
     * @return User
     */
    public function getUserById($id) :User
    {
        $this->user = $this->mapper->getUserById($id);
        return $this->user;
    }

    /**
     * Prepare user before validation (deleting whitespaces, slashes, tags etc)
     * @param User $obj
     * @return User
     */
    public function prepare(User $obj) :User
    {

        $obj = UserValidator::prepare($obj);
        return $obj;
    }

    /**
     * Check is user data valid for registration
     * @param User $obj
     * @return bool
     */
    public function isValidForRegister(User $obj) :bool
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

    /**
     * Check is user data valid for login
     * @param User $obj
     * @return bool
     */
    public function isValidForLogin(User $obj) :bool
    {
        if (UserValidator::validateLogin($obj->getLogin())
            && UserValidator::validatePassword($obj->getPassword())) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Change user password
     * @param User $obj
     * @return bool
     */
    public function changePassword(User $obj) :bool
    {
        return $this->mapper->changePassword($obj);
    }

    /**
     * Change user email
     * @param User $obj
     * @return bool
     */
    public function changeEmail(User $obj) :bool
    {
        return $this->mapper->changeEmail($obj);
    }

    /**
     * Delete user from database
     * @param User $obj
     * @return bool
     */
    public function delete(User $obj) :bool
    {
        $this->mapper->delete($obj);
        return true;
    }
}
