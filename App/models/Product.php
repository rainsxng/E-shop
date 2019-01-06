<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 10.12.18
 * Time: 17:56
 */
namespace Models;
use Core\Model;
use Mappers\ProductMapper;
class Product extends Model
{
    private $products = [];
    public function getItems()
    {
        $mapper = new ProductMapper();
        return $mapper->getAllProducts();
    }
    public function getItemById($id)
    {
     $mapper = new ProductMapper();
     return $mapper->getProductById($id);
    }
    public function getProductsByCategoryId($id){
       $mapper= new ProductMapper();
       return $mapper->getProductsByCategoryId($id);
    }

}