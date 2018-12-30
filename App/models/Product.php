<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 10.12.18
 * Time: 17:56
 */
namespace Models;
use Core\Model;

class Product extends Model
{
    private $items;
    private $products = [];
    public function __construct()
    {
        $this->items = include_once '../App/views/itemlist.php';
    }

    public function getItems()
    {
        return $this->items;
    }
    public function getItemById($id){
    foreach ($this->items as $key=>$value) {
            if ($key == $id){
                return [
                    "$key"=>[
                        'title'=>$this->items[$key]['title'],
                        'text'=>$this->items[$key]['text'],
                        'price'=>$this->items[$key]['price'],
                        'img'=>$this->items[$key]['img'],
                        'description'=>$this->items[$key]['description']
                    ]
                ];
            }
        }
    return 0;
    }
    public function getProductsByCategoryId($id){
        foreach ($this->items as $key=>$value) {
            if ($this->items[$key]['categoryId'] == $id) {
                $this->products [] =$this->items[$key];
            }
        }
        return $this->products;
    }

}