<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 19.01.2019
 * Time: 17:43
 */

namespace Models;

class Category
{
    private $id;
    private $name;
    public function getCategoryId()
    {
        return $this->id;
    }
    public function getCategoryName()
    {
        return $this->name;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    public function setName($name){
        $this->name = $name;
        return $this;
    }
    public function formArray($data): void
    {
        $this->setId($data['id']);
        $this->setName($data['name']);
    }
}