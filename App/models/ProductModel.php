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
class ProductModel extends Model
{
    private $products = [];
    private $mapper;
    public function __construct()
    {
        $this->mapper = new ProductMapper();
    }

    public function getItems()
    {
        return  $this->mapper->getAllProducts();
    }
    public function getItemByIdWithComments($id)
    {
     if (!empty($this->mapper->isCommentsExist($id)))
        return $this->mapper->getProductByIdWithComments($id);
     else
         return $this->mapper->getProductById($id);
    }
    public function getProductsByCategoryId($id){
       return $this->mapper->getProductsByCategoryId($id);
    }

}