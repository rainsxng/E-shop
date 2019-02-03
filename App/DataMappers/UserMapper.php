<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 04.01.2019
 * Time: 17:48
 */

namespace Mappers;

use Core\Database;
use Models\User;
use PDO;

class UserMapper
{
    /**
     * @var PDO $pdo
     */
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    /**
     * Get user info by Login
     * @param $login
     * @return User
     */
    public function getUserByLogin($login) :User
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE login=:login");
        $query->execute(array('login'=>$login));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $user = new User();
        $user->fromArray($row[0]);
        return $user;
    }

    /**
     * Get user info by id
     * @param $id
     * @return User
     */
    public function getUserById($id) :User
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $query->execute(array('id'=>$id));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $user = new User();
        $user->fromArray($row[0]);
        return $user;
    }

    /**
     * Add user to database
     * @param User $user
     * @return int
     */
    public function addUser(User $user) :int
    {
        $query=$this->pdo->prepare("INSERT INTO users (id, login, password, email, created_at, updated_at)
                                    VALUES (NULL, :login,  :password, :email,:created_at ,:updated_at);");
        $query->execute(array('login'=>$user->getLogin(),
            'password'=>password_hash($user->getPassword(), PASSWORD_BCRYPT),
            'email'=>$user->getEmail(),
            'created_at'=>$user->getCreatedAt(),
            'updated_at'=>$user->getUpdatedAt()));
        if ($query!==null) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Transform an array into an User Object
     * @param $data
     * @return User
     */
    public function mapArrayToUser($data) :User
    {
        $user = new User();
        $user->setId($data['id']);
        $user->setEmail($data['email']);
        $user->setLogin($data['login']);
        $user->setPassword($data['password']);
        return $user;
    }

    /**
     * Change password for user
     * @param User $obj
     * @return bool
     */
    public function changePassword(User $obj) :bool
    {
        $obj->setUpdatedAt(date('Y-m-d H:i:s'));
        $query = $this->pdo->prepare("UPDATE users SET password=:password, updated_at=:updated_at WHERE users.id=:id;");
        $query->execute(array(
            'id'=>$obj->getId(),
            'password'=>password_hash($obj->getPassword(), PASSWORD_BCRYPT),
            'updated_at'=>$obj->getUpdatedAt()));
        return true;
    }

    /**
     * Change email for user
     * @param User $obj
     * @return bool
     */
    public function changeEmail(User $obj) :bool
    {
        $obj->setUpdatedAt(date('Y-m-d H:i:s'));
        $query = $this->pdo->prepare("UPDATE users SET email=:email, updated_at=:updated_at WHERE users.id=:id;");
        $query->execute(array(
            'id'=>$obj->getId(),
            'email'=>$obj->getEmail(),
            'updated_at'=>$obj->getUpdatedAt()));
        return true;
    }

    /**
     * Delete user from database
     * @param User $obj
     * @return bool
     */
    public function delete(User $obj) :bool
    {
        $query = $this->pdo->prepare("DELETE FROM users WHERE users.id = :id AND users.login = :login");
        $query->execute(array(
            'id'=>$obj->getId(),
            'login'=>$obj->getLogin()
        ));
        return true;
    }
}
