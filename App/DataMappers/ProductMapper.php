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
class ProductMapper extends Mapper
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = parent::__construct();
    }
    public function getAllProducts(){
        $query = $this->pdo->query('SELECT products.id,products.name,products.quantity,price,image,description,brands.name as Brand,brands.id as brand_id,categories.name as Category,categories.id as category_id FROM `products`
        INNER JOIN brands on products.brand_id = brands.id
        INNER JOIN categories on products.category_id = categories.id;');
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }
    public function getProductById($id){
        $query = $this->pdo->prepare("SELECT products.id,products.name,products.price,products.quantity,products.image,products.description,brands.name as Brand,categories.name as Category,categories.id as category_id from products
INNER JOIN brands on products.brand_id=brands.id
INNER JOIN categories on products.category_id=categories.id
WHERE products.id=:id");
        $query->execute(array('id'=>$id));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        return $row;
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
}