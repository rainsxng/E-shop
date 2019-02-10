<?php

namespace Mappers;

use Core\Database;
use Models\Order;
use Models\User;
use PDO;

class OrderMapper
{
    /**
     * @var PDO $pdo
     */
    private $pdo;
    /**
     * @var Order $orderModel
     */
    private $orderModel;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    /**
     * Return orderId for user
     * @return bool
     */
    public function getOrderIdByUser()
    {
        $query=$this->pdo->prepare("SELECT orders.id FROM orders WHERE user_id=:user_id AND status='cart'");
        $query->execute(array('user_id'=>$_SESSION['user_id']));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $order_id=$row[0]['id'];
        if (!empty($order_id)) {
            return $order_id;
        } else {
            return false;
        }
    }

    /**
     * Create order for current user
     * @param Order $orderObj
     */
    public function createOrder(Order $orderObj)
    {
        if ($this->getOrderIdByUser()==false) {
            $query = $this->pdo->prepare("INSERT INTO orders VALUES (NULL,:user_id,'cart',current_timestamp(),current_timestamp());");
            $query->execute(array('user_id' => $orderObj->getUserId()));
            unset($query);
        }
    }

    /**
     * Delete order for user
     * @param Order $orderObj
     */
    public function delete(Order $orderObj)
    {
        $query=$this->pdo->prepare("DELETE FROM orders WHERE orders.user_id=:user_id;");
        $query->execute(array('user_id'=>$orderObj->getUserId()));
    }

    /**
     * Get all orders for user
     * @param User $userObj
     * @return array
     */
    public function getAllOrdersByUser(User $userObj) :array
    {
        $this->orderModel = new Order();
        $query=$this->pdo->prepare("SELECT orders.id,orders.created_at,orders.updated_at FROM orders
        WHERE orders.user_id = :user_id AND orders.status = 'order'");
        $query->execute(array('user_id'=>$userObj->getId()));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $orders = [];
        foreach ($row as $r) {
            array_push($orders, $this->orderModel->mapArrayToOrder($r));
        }
        return $orders;
    }

    /**
     * Get sum of order by order object
     * @param Order $orderObj
     * @return mixed
     */
    public function getSumForOrder(Order $orderObj)
    {
        $query=$this->pdo->prepare("SELECT SUM(products.price*orders_products.quantity) as sum from products
INNER JOIN orders_products on products.id=orders_products.product_id
INNER JOIN orders on orders.id = orders_products.order_id
WHERE orders.id = :order_id AND orders.status='order'");
        $query->execute(array('order_id'=>$orderObj->getId()));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        return $row[0]["sum"];
    }
}
