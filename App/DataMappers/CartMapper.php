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
    public function __construct()
    {
        $this->pdo = parent::__construct();
    }

    public function getCartProducts()
    {
        $id = $_SESSION['user_id'];
        $query = $this->pdo->query("SELECT products.name,products.price,orders_products.quantity,products.image,products.price*orders_products.quantity as summ from products
INNER JOIN orders_products on products.id=orders_products.product_id
INNER JOIN orders on orders.id = orders_products.order_id
WHERE orders.user_id = $id AND orders.status='cart'");
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }
}