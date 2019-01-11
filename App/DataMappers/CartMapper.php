<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 04.01.2019
 * Time: 17:48
 */

namespace Mappers;
use Core\Mapper;
use PDO;

class CartMapper extends Mapper
{
    private $pdo;
    private $summ;
    public function __construct()
    {
        $this->pdo = parent::__construct();
    }

    public function getCartProducts()
    {
        $query = $this->pdo->prepare("SELECT products.name,products.price,orders_products.quantity,products.image,products.price*orders_products.quantity as summ from products
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
    public function addProduct($product_id)
    {
        $query = $this->pdo->prepare("SELECT orders_products.id from orders_products
INNER JOIN orders on orders_products.order_id = orders.id
WHERE orders.user_id = :user_id AND orders.status='cart' AND orders_products.product_id=:product_id");
        $query->execute(array('product_id'=>$product_id,'user_id'=>$_SESSION['user_id']));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        if ($row==false || $row==[]) {
            $query = $this->pdo->prepare("
        INSERT INTO orders_products
        SELECT NULL,id,:product_id,1 FROM orders WHERE user_id = :user_id AND status ='cart'");
            $query->execute(array('product_id' => $product_id, 'user_id' => $_SESSION['user_id']));
        }
        else {
            $query = $this->pdo->prepare("UPDATE orders_products SET quantity = quantity+1 WHERE product_id =:product_id");
            $query->execute(array('product_id'=>$product_id));
        }
    }
}