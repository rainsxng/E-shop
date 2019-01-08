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
}