<?php

namespace Models;

use Core\Model;
use Mappers\OrderMapper;

class Order extends Model
{
    protected $id;
    protected $user_id;
    protected $status;
    protected $mapper;

    public function __construct()
    {
        parent::__construct();
        $this->mapper = new OrderMapper();
        $this->setId($this->mapper->getOrderIdByUser());
        $this->setUserId($_SESSION['user_id']);
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
        $this->mapper->createOrder(new Order());
    }
    public function delete()
    {
        $this->mapper->delete(new Order());
    }

    public function mapArrayToOrder(array $data)
    {
        $orderObj = new Order();
        $orderObj->setId($data['id']);
        $orderObj->setUserId($data['user_id']);
        $orderObj->setStatus($data['status']);
        return $orderObj;
    }

    public function getAllOrdersByUser(User $user)
    {
        return $this->mapper->getAllOrdersByUser($user);
    }
}
