<?php

namespace Mappers;

use Core\Database;
use Models\Order;
use Models\Product;
use Models\User;
use PDO;

class OrderMapper
{
    private $pdo;
    private $orderModel;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

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

    public function createOrder(Order $orderObj)
    {
        if ($this->getOrderIdByUser()==false) {
            $query = $this->pdo->prepare("INSERT INTO orders VALUES (NULL,:user_id,'cart',current_timestamp(),current_timestamp());");
            $query->execute(array('user_id' => $orderObj->getUserId()));
            unset($query);
        }
    }

    public function delete(Order $orderObj)
    {
        $query=$this->pdo->prepare("DELETE FROM orders WHERE orders.user_id=:user_id;");
        $query->execute(array('user_id'=>$orderObj->getUserId()));
    }

    public function getAllOrdersByUser(User $userObj)
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
