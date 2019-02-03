<?php

namespace Models;

use Mappers\CartMapper;

class Cart
{
    public function __construct($product_id = null, $quantity = null)
    {
        $this->mapper = new CartMapper();
        $this->orderModel = new Order();
        $this->setProductId($product_id);
        $this->setQuantity($quantity);
        $this->setOrderId($this->orderModel->getId());
    }
    /**
     * @var $id
     */
    private $id;
    /**
     * @var $order_id
     */
    private $order_id;
    /**
     * @var $quantity
     */
    private $quantity;
    /**
     * @var CartMapper
     */
    private $mapper;
    /**
     * @var $product_id
     */
    private $product_id;
    /**
     * @var Order
     */
    private $orderModel;
    /**
     * @var $sum
     */
    private static $sum;

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }


    /**
     * @return mixed
     */
    public static function getSum()
    {
        return self::$sum;
    }

    /**
     * @param mixed $sum
     */
    public static function setSum($sum)
    {
        self::$sum = $sum;
    }


    /**
     * @return CartMapper
     */
    public function getMapper()
    {
        return $this->mapper;
    }

    /**
     * @param CartMapper $mapper
     */
    public function setMapper($mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * @param mixed $order_id
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        if ($this->quantity == null) {
            $this->quantity = 1;
        }
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->mapper->getCartProducts();
    }

    /**
     * Add product to database cart
     * @param $product_id
     * @param null $quantity
     */
    public function addProduct($product_id, $quantity = null)
    {
        $this->mapper->addProduct(new Cart($product_id, $quantity));
    }

    /**
     * Delete product from database cart
     * @param $product_id
     */
    public function deleteOne($product_id)
    {
        $this->mapper->deleteOne(new Cart($product_id));
    }

    /**
     * Delete all products from database cart
     */
    public function deleteAll()
    {
        $this->mapper->delete(new Cart());
    }

    /**
     * Increase quantity of product in database cart
     * @param $product_id
     * @param $quantity
     */
    public function increaseQuantity($product_id, $quantity)
    {
        $this->mapper->increaseQuantity(new Cart($product_id, $quantity));
    }

    /**
     * Decrease quantity of product in database cart
     * @param $product_id
     * @param $quantity
     */
    public function decreaseQuantity($product_id, $quantity)
    {
        $this->mapper->decreaseQuantity(new Cart($product_id, $quantity));
    }

    /**
     * Checkout an order
     * @param Order $order
     */
    public function makeOrder(Order $order)
    {
        $this->mapper->makeOrder($order);
    }
}
