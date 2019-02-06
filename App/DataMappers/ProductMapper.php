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
    /**
     * @var PDO $pdo
     */
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    /**
     * Get al products from database
     * @return array
     */
    public function getAllProducts() :array
    {
        $query = $this->pdo->query('SELECT products.id,products.name,products.quantity,price,image,description,brands.name as Brand,brands.id as brand_id,categories.name as Category,categories.id as category_id FROM `products`
        INNER JOIN brands on products.brand_id = brands.id
        INNER JOIN categories on products.category_id = categories.id;');
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($row as $r) {
            array_push($products, $this->mapArrayToProduct($r));
        }
        return $products;
    }

    /**
     * Transform an array into an Product Object
     * @param $data
     * @return Product
     */
    private function mapArrayToProduct($data) :Product
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
        return  $product;
    }

    /**
     * Get product by product_id
     * @param $id
     * @return Product
     */
    public function getProductById($id) :Product
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

    /**
     * Get all products for by category_id
     * @param $id
     * @return array
     */
    public function getProductsByCategoryId($id) :array
    {
        $query = $this->pdo->prepare("SELECT products.name,products.id,products.price,products.quantity,products.image,products.description,brands.name as Brand,categories.name as Category,brands.id as brand_id,categories.id as category_id from categories
INNER JOIN products on categories.id=products.category_id
INNER JOIN brands on products.brand_id=brands.id
WHERE categories.id=:id");
        $query->execute(array('id' => $id));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($row as $r) {
            array_push($products, $this->mapArrayToProduct($r));
        }
        return $products;
    }

    /**
     * Update quantity of product in database
     * @param Product $obj
     * @param $value
     */
    public function updateQuantity(Product $obj, $value)
    {
        $query = $this->pdo->prepare("UPDATE products SET quantity = :value WHERE products.id = :id");
        $query->execute(array('id' => $obj->getId(),'value'=>$value));
    }

    /**
     * Increase quantity of product in database
     * @param Product $obj
     */
    public function increaseQuantity(Product $obj)
    {
        $query = $this->pdo->prepare("Update products SET quantity = quantity + :quantity WHERE products.id = :id");
        $query->execute(array('id' => $obj->getId(),'quantity'=>$obj->getQuantity()));
    }
    /**
     * Decrease quantity of product in database
     * @param Product $obj
     */
    public function decreaseQuantity(Product $obj)
    {
        $query = $this->pdo->prepare("Update products SET quantity = quantity - :quantity WHERE products.id = :id");
        $query->execute(array('id' => $obj->getId(),'quantity'=>$obj->getQuantity()));
    }

    /**
     * Get product by chose brands (filter)
     * @param $brands
     * @return array
     */
    public function getProductsByBrandName($brands) :array
    {
        $in ='';
        $arr = [];
        $brandsArr = explode(',', $brands);
        for ($i = 0; $i < count($brandsArr); $i++) {
            $arr['brand' . $i] = $brandsArr[$i];
            if ($i < count($brandsArr) - 1) {
                $in .= ":brand$i,";
            } else {
                $in .= ":brand$i";
            }
        }
        $query = $this->pdo->prepare('SELECT products.id,products.name,products.quantity,price,image,description,brands.name as Brand,brands.id as brand_id,categories.name as Category,categories.id as category_id FROM `products`
        INNER JOIN brands on products.brand_id = brands.id
        INNER JOIN categories on products.category_id = categories.id
        WHERE brands.name IN ('.$in.')');
        $query->execute($arr);
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $products = [];
        foreach ($row as $r) {
            array_push($products, $this->mapArrayToProduct($r));
        }
        return $products;
    }

    /**
     * Get searched items
     * @param $name
     * @return array
     */
    public function getSearchProducts($name)
    {
        $name = "%$name%";
        $query = $this->pdo->prepare("SELECT id,name FROM products WHERE products.name LIKE :name");
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->execute();
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }
}
