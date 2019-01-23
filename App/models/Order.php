<?php

namespace Models;

use Mappers\OrderMapper;

class Order
{
    private $id;
    private $user_id;
    private $status;
    private $mapper;
    private $obj;

    public function __construct()
    {
        $this->mapper = new OrderMapper();
        $this->setId($this->mapper->getOrderIdByUser());
        $this->setUserId($_SESSION['user']);
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
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function createOrder()
    {
        $this->mapper->createOrder($this->obj);
    }
    public function delete(Order $orderObj)
    {
        $this->mapper->delete($orderObj);
    }
}
