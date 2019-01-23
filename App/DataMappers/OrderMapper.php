<?php

namespace Mappers;

use Core\Database;
use Models\Order;
use PDO;

class OrderMapper
{
    private $pdo;
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
}
