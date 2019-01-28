<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 27.01.2019
 * Time: 12:00
 */

namespace Validators;

use Models\User;
use Core\Response;

class UserValidator
{
    public static function prepare(User $user)
    {
        $user->setLogin(trim($user->getLogin()));
        $user->setLogin(stripslashes($user->getLogin()));
        $user->setLogin(htmlspecialchars($user->getLogin()));
        $user->setLogin(preg_replace('/\s/', '', $user->getLogin()));
        $user->setEmail(trim($user->getEmail()));
        $user->setEmail(stripslashes($user->getEmail()));
        $user->setEmail(htmlspecialchars($user->getEmail()));
        $user->setEmail(preg_replace('/\s/', '', $user->getEmail()));
        return $user;
    }
    public static function validateLogin($login)
    {
        if (mb_strlen($login)<3 || mb_strlen($login)>25) {
            Response::setResponseCode(403);
            Response::setContent("Длина логина должна быть  от 3 до 25 символов", "");
            Response::send();
            return 0;
        }
        if (preg_match("/[а-яё]/iu", $login)) {
            Response::setResponseCode(403);
            Response::setContent("Логин должен состоять только из латинских символов", "");
            Response::send();
            return 0;
        }
        return 1;
    }

    public static function validateEmail($email)
    {
        if (mb_strlen($email)==0) {
            Response::setResponseCode(403);
            Response::setContent("Пожалуйста введите email", "");
            Response::send();
            return 0;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Response::setResponseCode(403);
            Response::setContent("Некорректный email", "");
            Response::send();
            return 0;
        }
        if (!preg_match("/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/", $email)) {
            Response::setResponseCode(403);
            Response::setContent("Email должен состоять только из латинских символов", "");
            Response::send();
            return 0;
        }
        return 1;
    }

    public static function validatePassword($password)
    {
        if (strlen($password)<=3) {
            Response::setResponseCode(403);
            Response::setContent("Пароль должен состоять минимум из 4 знаков", "");
            Response::send();
            return 0;
        }
        return 1;
    }
}
