<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 30.01.2019
 * Time: 8:15
 */

namespace Tests;

use Models\Product;
use PHPUnit\Framework\TestCase;
use Validators\ProductValidator;

class ProductValidatorTest extends TestCase
{
    /**
     * @var Product
     */
    private $product;

    public function setUp()
    {
        $this->product = new Product();
    }

    public function testIsIdValid()
    {
        $this->product->setId("1");
        $this->assertTrue(ProductValidator::validateProductId($this->product->getId()));
        $this->product->setId("xx");
        $this->assertFalse(ProductValidator::validateProductId($this->product->getId()));
    }

    public function testPrepareFunction()
    {
        $this->assertInstanceOf(Product::class, ProductValidator::prepare($this->product));
    }
}
