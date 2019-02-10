<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 19.01.2019
 * Time: 17:43
 */

namespace Models;

use Core\Model;
use Mappers\ProductMapper;
use Validators\ProductValidator;

class Product extends Model
{
    public function __construct($id = null, $quantity = null)
    {
        parent::__construct();
        $this->mapper = new ProductMapper();
        $this->setId($id);
        $this->setQuantity($quantity);
    }
    /**
     * @var $id
     */
    private $id;
    /**
     * @var $category_id
     */
    private $category_id;
    /**
     * @var $brand_id
     */
    private $brand_id;
    /**
     * @var $name
     */
    private $name;
    /**
     * @var $price
     */
    private $price;
    /**
     * @var $quantity
     */
    private $quantity;
    /**
     * @var $image
     */
    private $image;
    /**
     * @var $description
     */
    private $description;
    /**
     * @var $category
     */
    private $category;
    /**
     * @var $brand
     */
    private $brand;
    /**
     * @var ProductMapper
     */
    private $mapper;
    /**
     * @var $sum
     */
    private $sum;
    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum)
    {
        $this->sum = $sum;
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
        if ($this->image == '' || is_null($this->image)) {
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

    /**
     * @return array
     */
    public function getAllProducts()
    {
        return $this->mapper->getAllProducts();
    }

    /**
     * Transform an array into an Product Object
     * @param $data
     * @return $this
     */
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
        return $this;
    }

    /**
     * Get products bt category_id
     * @param $id
     * @return array
     */
    public function getProductByCategoryId($id)
    {
        return $this->mapper ->getProductsByCategoryId($id);
    }

    /**
     * Get product info by id
     * @param $id
     * @return Product
     */
    public function getProductById($id)
    {
        return $this->mapper->getProductById($id);
    }

    /**
     * Update quantity of products in database
     * @param $product_id
     * @param $quantity
     */
    public function updateQuantity($product_id, $quantity)
    {
        $this->mapper->updateQuantity(new Product($product_id), $quantity);
    }

    /**
     * Increase quantity of product in database
     * @param $product_id
     * @param $quantity
     */
    public function increaseQuantity($product_id, $quantity)
    {
        $this->mapper->increaseQuantity(new Product($product_id, $quantity));
    }

    /**
     * Decrease quantity of product in database
     * @param $product_id
     * @param $quantity
     */
    public function decreaseQuantity($product_id, $quantity)
    {
        $this->mapper->decreaseQuantity(new Product($product_id, $quantity));
    }

    /**
     * Check is product valid
     * @param Product $obj
     * @return bool
     */
    public function isValid(Product $obj) :bool
    {
        if (ProductValidator::validateProductId($obj->getId())) {
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * Get products by chose brands
     * @param $brands
     * @return array
     */
    public function getProductsByBrand($brands) :array
    {
        return $this->mapper->getProductsByBrandName($brands);
    }

    /**
     * Get searched products
     * @param $title
     * @return array
     */
    public function getSearchProducts($title)
    {
        return $this->mapper->getSearchProducts($title);
    }

    /**
     * @param $productObj
     * @return bool
     */
    public function insert($productObj)
    {
        return $this->mapper->insert($productObj);
    }
}
