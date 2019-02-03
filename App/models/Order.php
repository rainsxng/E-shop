<?php

namespace Models;

use Core\Model;
use Mappers\OrderMapper;

class Order extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->mapper = new OrderMapper();
        $this->setId($this->mapper->getOrderIdByUser());
        $this->setUserId($_SESSION['user_id']);
    }
    /**
     * @var $id
     */
    protected $id;
    /**
     * @var $user_id
     */
    protected $user_id;
    /**
     * @var $status
     */
    protected $status;
    /**
     * @var OrderMapper
     */
    protected $mapper;
    /**
     * @var $sum
     */
    protected $sum;
    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum): void
    {
        $this->sum = $sum;
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

    /**
     * Create new order
     */
    public function createOrder()
    {
        $this->mapper->createOrder(new Order());
    }

    /**
     * Delete order
     */
    public function delete()
    {
        $this->mapper->delete(new Order());
    }

    /**
     * Transform an array into an Order Object
     * @param array $data
     * @return Order
     */
    public function mapArrayToOrder(array $data) :Order
    {
        $orderObj = new Order();
        $orderObj->setId($data['id']);
        $orderObj->setUserId($data['user_id']);
        $orderObj->setStatus($data['status']);
        return $orderObj;
    }

    /**
     * Get all orders for user
     * @param User $user
     * @return array
     */
    public function getAllOrdersByUser(User $user) :array
    {
        return $this->mapper->getAllOrdersByUser($user);
    }

    /**
     * Get sum of order
     * @param Order $order
     * @return mixed
     */
    public function getSumForOrder(Order $order)
    {
        return $this->mapper->getSumForOrder($order);
    }
}
