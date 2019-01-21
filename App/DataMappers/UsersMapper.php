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

class UsersMapper
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }
    public function getUser($login)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE login=:login");
        $query->execute(array('login'=>$login));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $user = new User();
        $user->fromArray($row[0]);
        return $user;
    }
    public function addUser($login, $pswd, $email)
    {
        $query=$this->pdo->prepare("INSERT INTO users (id, login, password, email, created_at, updated_at) VALUES (NULL, :login,  :password, :email,CURRENT_TIMESTAMP ,CURRENT_TIMESTAMP )");
        $query->execute(array('login'=>$login,'password'=>password_hash($pswd, PASSWORD_BCRYPT),'email'=>$email));
        if ($query!==null) {
            return 0;
        } else {
            return 1;
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
}
