<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 04.01.2019
 * Time: 17:48
 */

namespace Mappers;
use Core\Mapper;
use PDO;
class UsersMapper extends Mapper
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = parent::__construct();
    }
    public function getUser($login,$pswd)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE login=:login AND password=:pswd");
        $query->execute(array('login'=>$login,'pswd'=>$pswd));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }
    public function addUser($login,$pswd,$email)
    {
        var_dump($login);
        var_dump($pswd);
        var_dump($pswd);
        $query=$this->pdo->prepare("INSERT INTO users (id, login, password, email, created_at, updated_at) VALUES (NULL, :login,  :password, :email, NULL, NULL)");
        $query->execute(array('login'=>$login,'password'=>$pswd,'email'=>$email));
        if ($query!==NULL){
            return 0;
        }
        else return 1;
    }

}