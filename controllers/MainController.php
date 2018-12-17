<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 12.12.18
 * Time: 16:14
 */
include "models/ProductModel.php";
class MainController
{
    public function getAll(){
        $productModel = new ProductModel();
        $items = $productModel->getItems();
        return $items;
    }
    public function geById($id=1){
        $productModel = new ProductModel();
        $item = $productModel->getItemById($id);
        return $item;
    }
}