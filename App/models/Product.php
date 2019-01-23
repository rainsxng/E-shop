<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 19.01.2019
 * Time: 17:43
 */

namespace Models;


use Mappers\ProductMapper;

class Product
{
    private $id;
    private $category_id;
    private $brand_id;
    private $name;
    private $price;
    private $quantity;
    private $image;
    private $description;
    private $category;
    private $brand;
    private $mapper;
    public function __construct()
    {
        $this->mapper = new ProductMapper();
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * @param mixed $brand_id
     */
    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
        if (empty($this->image)) {
            $this->image = "/img/Image-not-found.jpeg";
        }
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getAllProducts()
    {
        return $this->mapper->getAllProducts();
    }
    public function fromArray($data)
    {
        $this->setId($data['id']);
        $this->setName($data['name']);
        $this->setDescription($data['description']);
        $this->setCategory($data['Category']);
        $this->setPrice($data['price']);
        $this->setImage($data['image']);
        $this->setBrand($data['Brand']);
        $this->setCategoryId($data['category_id']);
        $this->setBrandId($data['brand_id']);
        $this->setQuantity($data['quantity']);
    }
    public function getProductByCategoryId($id)
    {
        return $this->mapper ->getProductsByCategoryId($id);
    }
    public function getProductById($id)
    {
        return $this->mapper->getProductById($id);
    }
}