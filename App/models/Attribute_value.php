<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 26.01.2019
 * Time: 22:42
 */

namespace Models;


use Core\Model;
use Mappers\Attribute_ValueMapper;

class Attribute_value extends Model
{
    private $id;
    private $attribute_id;
    private $value;
    private $product_id;
    private $mapper;
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
    public function getAttributeId()
    {
        return $this->attribute_id;
    }

    /**
     * @param mixed $attribute_id
     */
    public function setAttributeId($attribute_id)
    {
        $this->attribute_id = $attribute_id;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    public function __construct()
    {
        parent::__construct();
        $this->mapper = new Attribute_ValueMapper();
    }

    public function getAllForProduct(Attribute_value $obj)
    {
        return $this->mapper->getAttributeValue($obj);
    }

}