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
use Models\Product;

class ProductMapper
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }
    public function getAllProducts()
    {
        $query = $this->pdo->query('SELECT products.id,products.name,products.quantity,price,image,description,brands.name as Brand,brands.id as brand_id,categories.name as Category,categories.id as category_id FROM `products`
        INNER JOIN brands on products.brand_id = brands.id
        INNER JOIN categories on products.category_id = categories.id;');
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($row as $r)
            array_push($products, $this->mapArrayToProduct($r));
        return $products;
    }
    private function mapArrayToProduct($data) {
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
        return  $product;
    }

    public function getProductByIdWithComments($id)
    {
        $query = $this->pdo->prepare("SELECT products.id,products.name,products.price,products.quantity,products.image,products.description,brands.name as Brand,categories.name as Category,categories.id as category_id,comments.id as comment_id,comments.message,comments.stars,users.login from products
INNER JOIN brands on products.brand_id=brands.id
INNER JOIN categories on products.category_id=categories.id
LEFT JOIN comments on products.id=comments.product_id
INNER JOIN users on comments.user_id=users.id
WHERE products.id=:id");
        $query->execute(array('id'=>$id));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }
    public function getProductComments($product_id)
    {
        $query=$this->pdo->prepare("SELECT  comments.date,comments.message,comments.stars,users.login as user_login FROM comments
INNER JOIN users on comments.user_id=users.id
WHERE comments.product_id=:id;");
        $query->execute(array('id'=>$product_id));
        $row=$query->fetchALL(PDO::FETCH_ASSOC);
        $query=$this->pdo->prepare("SELECT count(*) as comment_count FROM comments 
WHERE comments.product_id=:id;");
        $query->execute(array('id'=>$product_id));
        $row[0]['count'] = $query->fetchColumn();
        return $row;
    }
    public function getProductById($id)
    {
        $query = $this->pdo->prepare("SELECT products.id,products.name,products.price,products.quantity,products.image,products.description,brands.name as Brand,categories.name as Category,categories.id as category_id,brands.id as brand_id from products
INNER JOIN brands on products.brand_id=brands.id
INNER JOIN categories on products.category_id=categories.id
WHERE products.id=:id");
        $query->execute(array('id'=>$id));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $product = new Product();
        $product->fromArray($row[0]);
        return $product;
    }
    public function getProductsByCategoryId($id)
    {
        $query = $this->pdo->prepare("SELECT products.name,products.id,products.price,products.quantity,products.image,products.description,brands.name as Brand,categories.name as Category from categories
INNER JOIN products on categories.id=products.category_id
INNER JOIN brands on products.brand_id=brands.id
WHERE categories.id=:id");
        $query->execute(array('id'=>$id));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }
    public function isCommentsExist($product_id)
    {
        $query = $this->pdo->prepare("SELECT comments.id FROM  products
 LEFT JOIN comments on products.id=comments.product_id
INNER JOIN users on comments.user_id=users.id WHERE products.id=:id;");
        $query->execute(array('id'=>$product_id));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }
}
