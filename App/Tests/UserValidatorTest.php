<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 30.01.2019
 * Time: 8:15
 */

namespace Tests;

use Models\User;
use PHPUnit\Framework\TestCase;
use Validators\UserValidator;

class UserValidatorTest extends TestCase
{
    /**
     * @var User
     */
    private $user;

    public function setUp()
    {
        $this->user = new User();
    }

    public function testIsLoginValid()
    {
        $this->user->setLogin("rasweq");
        $this->assertTrue(UserValidator::validateLogin($this->user->getLogin()));
        $this->user->setLogin("xx");
        $this->assertFalse(UserValidator::validateLogin($this->user->getLogin()));
    }

    public function testIsPasswordValid()
    {
        $this->user->setPassword("xxxx3");
        $this->assertTrue(UserValidator::validatePassword($this->user->getPassword()));
        $this->user->setPassword("12");
        $this->assertFalse(UserValidator::validatePassword($this->user->getPassword()));
    }

    public function testIsEmailValid()
    {
        $this->user->setEmail("starsettime@gmail.com");
        $this->assertTrue(UserValidator::validateEmail($this->user->getEmail()));
        $this->user->setEmail("фів@xas.ru");
        $this->assertFalse(UserValidator::validateEmail($this->user->getEmail()));
    }

    public function testPrepareFunction()
    {
        $this->assertInstanceOf(User::class, UserValidator::prepare($this->user));
    }
}
