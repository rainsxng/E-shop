<?php

namespace Models;

use Mappers\CartMapper;

class Cart
{
    private $id;
    private $order_id;
    private $quantity;
    private $mapper;
    private $product_id;
    private $orderModel;
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

    public function __construct($product_id = null)
    {
        $this->mapper = new CartMapper();
        $this->orderModel = new Order();
        $this->setProductId($product_id);
        $this->setOrderId($this->orderModel->getId());
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

    public function getProducts()
    {
        return $this->mapper->getCartProducts();
    }

    public function addProduct($product_id)
    {
        $this->mapper->addProduct(new Cart($product_id));
    }
    public function deleteOne($product_id)
    {
        $this->mapper->deleteOne(new Cart($product_id));
    }
    public function deleteAll()
    {
        $this->mapper->delete(new Cart());
    }
    public function increaseByOne($product_id)
    {
        $this->mapper->increaseByOne(new Cart($product_id));
    }
    public function decreaseByOne($product_id)
    {
        $this->mapper->decreaseByOne(new Cart($product_id));
    }
}
