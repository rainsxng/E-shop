<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 30.01.2019
 * Time: 8:15
 */

namespace Tests;

use Models\Cart;
use PHPUnit\Framework\TestCase;

class CartModelTest extends TestCase
{
    /**
     * @var Cart
     */
    private $cart;

    public function testAddingProductsToCart()
    {
        $this->cart = $this->createMock(Cart::class);
        $this->assertInstanceOf(Cart::class, $this->cart);
        $this->cart->setProductId(1);
        $this->cart->setQuantity(1);
        $this->cart->setOrderId(1);
        $this->cart->expects($this->once())
            ->method('addProduct')
            ->with($this->equalTo($this->cart))
            ->will($this->returnValue(true));
        $this->cart->addProduct($this->cart);
    }

    public function testDecreaseQuantityOfProduct()
    {
        $this->cart = $this->createMock(Cart::class);
        $this->assertInstanceOf(Cart::class, $this->cart);
        $this->cart->setProductId(1);
        $this->cart->setQuantity(1);
        $this->cart->setOrderId(1);
        $this->cart->expects($this->once())
            ->method('decreaseQuantity')
            ->with($this->equalTo($this->cart->getProductId()), $this->equalTo($this->cart->getQuantity()))
            ->will($this->returnValue(true));
        $this->cart->decreaseQuantity($this->cart->getProductId(), $this->cart->getQuantity());
    }

    public function testIncreaseQuantityOfProduct()
    {
        $this->cart = $this->createMock(Cart::class);
        $this->assertInstanceOf(Cart::class, $this->cart);
        $this->cart->setProductId(1);
        $this->cart->setQuantity(1);
        $this->cart->setOrderId(1);
        $this->cart->expects($this->once())
            ->method('increaseQuantity')
            ->with($this->equalTo($this->cart->getProductId()), $this->equalTo($this->cart->getQuantity()))
            ->will($this->returnValue(true));
        $this->cart->increaseQuantity($this->cart->getProductId(), $this->cart->getQuantity());
    }

    public function testDeleteOne()
    {
        $this->cart = $this->createMock(Cart::class);
        $this->assertInstanceOf(Cart::class, $this->cart);
        $this->cart->setProductId(1);
        $this->cart->expects($this->once())
            ->method('deleteOne')
            ->with($this->equalTo($this->cart->getProductId()));
        $this->cart->deleteOne($this->cart->getProductId());
    }
    public function testDeleteAll()
    {
        $this->cart = $this->createMock(Cart::class);
        $this->assertInstanceOf(Cart::class, $this->cart);
        $this->cart->expects($this->once())
            ->method('deleteAll');
        $this->cart->deleteAll();
    }
}
