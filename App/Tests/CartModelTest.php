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
}
