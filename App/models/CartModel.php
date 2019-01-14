<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 10.12.18
 * Time: 17:56
 */
namespace Models;
use Core\Model;
use Mappers\CartMapper;
class CartModel extends Model
{
    public function getProducts(){
        $mapper = new CartMapper();
        return $mapper->getCartProducts();
    }
    public function addProduct($product_id,$quantity=1){
        $mapper = new CartMapper();
        $mapper->addProduct($product_id,$quantity);
    }
    public function deleteOne($product_id){
        $mapper = new CartMapper();
        $mapper->deleteOne($product_id);
    }
    public function deleteAll(){
        $mapper = new CartMapper();
        $mapper->deleteAll();
    }
    public function increaseByOne($product_id){
        $mapper = new CartMapper();
        $mapper->increaseByOne($product_id);
    }
    public function decreaseByOne($product_id){
        $mapper = new CartMapper();
        $mapper->decreaseByOne($product_id);
    }
}