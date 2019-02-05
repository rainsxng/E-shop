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

class UserModelTest extends TestCase
{
    /**
     * @var User
     */
    private $user;

    public function testAddUser()
    {
        $this->user = $this->createMock(User::class);
        $this->assertInstanceOf(User::class, $this->user);
        $this->user->setEmail("zxczxcz@gmail.com");
        $this->user->setLogin("realnewuser234");
        $this->user->setPassword("1234");
        $this->user->expects($this->once())
            ->method('registration')
            ->with($this->equalTo($this->user))
            ->will($this->returnValue(1));
        $this->user->registration($this->user);
    }

    public function testDeleteUser()
    {
        $this->user = $this->createMock(User::class);
        $this->assertInstanceOf(User::class, $this->user);
        $this->user->setEmail("zxczxcz@gmail.com");
        $this->user->setLogin("realnewuser234");
        $this->user->expects($this->once())
            ->method('delete')
            ->with($this->equalTo($this->user))
            ->will($this->returnValue(1));
        $this->user->delete($this->user);
    }

    public function testIsUserValidForLogin()
    {
        $this->user = $this->createMock(User::class);
        $this->assertInstanceOf(User::class, $this->user);
        $this->user->setEmail("zxczxcz@gmail.com");
        $this->user->setLogin("realnewuser234");
        $this->user->expects($this->once())
            ->method('isValidForLogin')
            ->with($this->equalTo($this->user))
            ->will($this->returnValue(true));
        $this->user->isValidForLogin($this->user);
    }
}
