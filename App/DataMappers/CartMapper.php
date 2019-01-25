<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 04.01.2019
 * Time: 17:48
 */

namespace Mappers;

use Core\Database;
use Models\Cart;
use Models\Order;
use Models\Product;
use PDO;

class CartMapper
{
    private $pdo;
    private $summ;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function getCartProducts()
    {
        $products = [];
        $query = $this->pdo->prepare("SELECT products.id,products.name,products.price,orders_products.quantity,products.image,products.price*orders_products.quantity as summ from products
INNER JOIN orders_products on products.id=orders_products.product_id
INNER JOIN orders on orders.id = orders_products.order_id
WHERE orders.user_id = :id AND orders.status='cart'");
        $query->execute(array('id'=>$_SESSION['user_id']));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        foreach ($row as $key => $value) {
            $this->summ+=$row[$key]['price']*$row[$key]['quantity'];
        }
        Cart::setSum($this->summ);
        foreach ($row as $r) {
            array_push($products, $this->mapArrayToProduct($r));
        }
        return $products;
    }

    public function addProduct(Cart $cartObj)
    {
        $orderObj = new Order();
        $orderObj->createOrder();
        $query = $this->pdo->prepare("SELECT orders_products.id from orders_products
INNER JOIN orders on orders_products.order_id = orders.id
WHERE orders.user_id = :user_id AND orders.status='cart' AND orders_products.product_id=:product_id");
        $query->execute(array('product_id'=>$cartObj->getProductId(),'user_id'=> $orderObj->getUserId()));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        if (empty($row)) {
            $query = $this->pdo->prepare("
        INSERT INTO orders_products
        SELECT NULL,id,:product_id,:quantity FROM orders WHERE user_id = :user_id AND status ='cart'");
            $query->execute(array
            (
                'product_id' => $cartObj->getProductId(),
                'user_id' => $orderObj->getUserId(),
                'quantity'=>$cartObj->getQuantity()));
            $product = new Product();
            $product->decreaseQuantity($cartObj->getOrderId(), $cartObj->getQuantity());
            unset($query);
        } else {
            $query = $this->pdo->prepare("UPDATE orders_products 
            SET quantity = quantity+:quantity WHERE product_id =:product_id;");
            $query->execute(array
            (
                'product_id'=>$cartObj->getProductId(),
                'quantity'=>$cartObj->getQuantity()));
            $product = new Product();
            $product->decreaseQuantity($cartObj->getProductId(), $cartObj->getQuantity());
            unset($query);
        }
    }

    public function deleteOne(Cart $cartObj)
    {
        $query = $this->pdo->prepare("
        DELETE FROM orders_products
        WHERE product_id=:product_id AND order_id=:order_id;");
        $query->execute(array('product_id'=>$cartObj->getProductId(),'order_id'=>$cartObj->getOrderId()));
        unset($query);
    }

    public function delete(Cart $cartObj)
    {
        $query = $this->pdo->prepare("DELETE FROM orders_products WHERE order_id=:order_id;");
        $query->execute(array('order_id'=>$cartObj->getOrderId()));
    }

    public function increaseQuantity(Cart $cartObj)
    {
        $productObj = new Product($cartObj->getProductId());
        $query = $this->pdo->prepare("UPDATE orders_products SET quantity = quantity+ :quantity
        WHERE product_id =:product_id AND orders_products.order_id = :order_id");
        $query->execute(array('product_id'=>$productObj->getId(),
            'order_id'=>$cartObj->getOrderId(),
            'quantity'=>$cartObj->getQuantity()));
        $productObj->increaseQuantity($productObj->getId(), 1);
        unset($query);
    }

    public function decreaseQuantity(Cart $cartObj)
    {
        $productObj = new Product($cartObj->getProductId());
        $query = $this->pdo->prepare("UPDATE orders_products SET quantity = quantity-:quantity WHERE product_id =:product_id AND orders_products.order_id = :order_id");
        $query->execute(array('product_id'=>$productObj->getId(),'order_id'=>$cartObj->getOrderId(),'quantity'=>$cartObj->getQuantity()));
        $productObj->decreaseQuantity($productObj->getId(), 1);
        unset($query);
    }

    private function mapArrayToProduct($data)
    {
        $product = new Product();
        $product->setId($data['id']);
        $product->setName($data['name']);
        $product->setQuantity($data['quantity']);
        $product->setImage($data['image']);
        $product->setDescription($data['description']);
        $product->setPrice($data['price']);
        $product->setCategory($data['Category']);
        $product->setBrand($data['Brand']);
        $product->setBrandId($data['brand_id']);
        $product->setCategoryId($data['category_id']);
        $product->setSum($data['summ']);
        return  $product;
    }
}
