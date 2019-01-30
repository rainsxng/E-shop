<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 30.01.19
 * Time: 16:20
 */

namespace Controllers;

use Core\Controller;
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
}