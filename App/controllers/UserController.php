<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 30.01.19
 * Time: 16:20
 */

namespace Controllers;

use Core\Controller;
use Core\Response;
use Models\User;

class UserController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getUser()
    {
        if ($_SESSION['isLogged']===false)
        {
            self::render('404');
        }
        else {
            $this->user = $this->user->getUserById($_SESSION['user_id']);
            self::render('user',['user'=>$this->user]);
        }
    }
    public function changePassword()
    {
        $this->user = $this->user->getUserById($_SESSION['user_id']);
        if (password_verify($_POST['oldPassword'], $this->user->getPassword())){
            $this->user->setPassword($_POST['newPassword']);
            $this->user->changePassword($this->user);
                Response::setResponseCode(200);
                Response::setContent("Успешно изменено", "");
                Response::send();
            }
        else {
            Response::setResponseCode(403);
            Response::setContent("Неверный пароль", "");
            Response::send();
            }
    }
}