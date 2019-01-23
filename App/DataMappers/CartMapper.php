<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 04.01.2019
 * Time: 17:48
 */

namespace Mappers;

use Core\Database;
use PDO;

class CartMapper
{
    private $pdo;
    private $summ;
    private $order_id;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
        $this->order_id = $this->getOrderIdByUser();
    }

    public function getCartProducts()
    {
        $query = $this->pdo->prepare("SELECT products.id,products.name,products.price,orders_products.quantity,products.image,products.price*orders_products.quantity as summ from products
INNER JOIN orders_products on products.id=orders_products.product_id
INNER JOIN orders on orders.id = orders_products.order_id
WHERE orders.user_id = :id AND orders.status='cart'");
        $query->execute(array('id'=>$_SESSION['user_id']));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        foreach ($row as $key=>$value) {
            $this->summ+=$row[$key]['price']*$row[$key]['quantity'];
        }
        $row['Summary'] =$this->summ;
        return $row;
    }

    public function addProduct($product_id, $quantity=1)
    {
        $this->createOrder();
        $query = $this->pdo->prepare("SELECT orders_products.id from orders_products
INNER JOIN orders on orders_products.order_id = orders.id
WHERE orders.user_id = :user_id AND orders.status='cart' AND orders_products.product_id=:product_id");
        $query->execute(array('product_id'=>$product_id,'user_id'=>$_SESSION['user_id']));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        if (empty($row)) {
            $query = $this->pdo->prepare("
        INSERT INTO orders_products
        SELECT NULL,id,:product_id,:quantity FROM orders WHERE user_id = :user_id AND status ='cart';
        UPDATE products SET quantity = quantity - :quantity WHERE products.id = :product_id");
            $query->execute(array('product_id' => $product_id, 'user_id' => $_SESSION['user_id'],'quantity'=>$quantity));
            unset($query);
        } else {
            $query = $this->pdo->prepare("UPDATE orders_products SET quantity = quantity+:quantity WHERE product_id =:product_id;
            UPDATE products SET quantity = quantity-:quantity WHERE products.id = :product_id");
            $query->execute(array('product_id'=>$product_id,'quantity'=>$quantity));
            unset($query);
        }
    }
    public function deleteOne($product_id)
    {
        $query = $this->pdo->prepare("
        DELETE FROM orders_products
        WHERE product_id=:product_id AND order_id=:order_id;");
        $query->execute(array('product_id'=>$product_id,'order_id'=>$this->order_id));
        unset($query);
    }
    public function deleteAll()
    {
        $user_id = $_SESSION['user_id'];
        $query = $this->pdo->prepare("DELETE FROM orders_products WHERE order_id=:order_id;");
        $query->execute(array('order_id'=>$this->order_id));
        $query="DELETE FROM orders WHERE orders.user_id=:user_id;";
        $query->execute(array('user_id'=>$user_id));
    }
    public function increaseByOne($product_id)
    {
        $query = $this->pdo->prepare("UPDATE orders_products SET quantity = quantity+1 WHERE product_id =:product_id AND orders_products.order_id = :order_id;
        UPDATE products SET quantity = quantity - 1 WHERE products.id = :product_id;");
        $query->execute(array('product_id'=>$product_id,'order_id'=>$this->order_id));
        unset($query);
    }
    public function decreaseByOne($product_id)
    {
        $query = $this->pdo->prepare("UPDATE orders_products SET quantity = quantity-1 WHERE product_id =:product_id AND orders_products.order_id = :order_id;
        UPDATE products SET quantity = quantity +1 WHERE products.id = :product_id;");
        $query->execute(array('product_id'=>$product_id,'order_id'=>$this->order_id));
        unset($query);
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
    public function createOrder()
    {
        if ($this->getOrderIdByUser()==false) {
            $query = $this->pdo->prepare("INSERT INTO orders VALUES (NULL,:user_id,'cart',current_timestamp(),current_timestamp());");
            $query->execute(array('user_id' => $_SESSION['user_id']));
            unset($query);
        }
    }
}
