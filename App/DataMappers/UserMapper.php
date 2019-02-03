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
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }
    public function getUserByLogin($login)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE login=:login");
        $query->execute(array('login'=>$login));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $user = new User();
        $user->fromArray($row[0]);
        return $user;
    }
    public function getUserById($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $query->execute(array('id'=>$id));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $user = new User();
        $user->fromArray($row[0]);
        return $user;
    }
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
    public function mapArrayToUser($data):User
    {
        $user = new User();
        $user->setId($data['id']);
        $user->setEmail($data['email']);
        $user->setLogin($data['login']);
        $user->setPassword($data['password']);
        return $user;
    }

    public function changePassword(User $obj)
    {
        $obj->setUpdatedAt(date('Y-m-d H:i:s'));
        $query = $this->pdo->prepare("UPDATE users SET password=:password, updated_at=:updated_at WHERE users.id=:id;");
        $query->execute(array(
            'id'=>$obj->getId(),
            'password'=>password_hash($obj->getPassword(), PASSWORD_BCRYPT),
            'updated_at'=>$obj->getUpdatedAt()));
        return true;
    }

    public function changeEmail(User $obj)
    {
        $obj->setUpdatedAt(date('Y-m-d H:i:s'));
        $query = $this->pdo->prepare("UPDATE users SET email=:email, updated_at=:updated_at WHERE users.id=:id;");
        $query->execute(array(
            'id'=>$obj->getId(),
            'email'=>$obj->getEmail(),
            'updated_at'=>$obj->getUpdatedAt()));
        return true;
    }

    public function delete(User $obj)
    {
        $query = $this->pdo->prepare("DELETE FROM users WHERE users.id = :id AND users.login = :login");
        $query->execute(array(
            'id'=>$obj->getId(),
            'login'=>$obj->getLogin()
        ));
        return true;
    }
}