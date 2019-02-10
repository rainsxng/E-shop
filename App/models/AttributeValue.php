<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 26.01.2019
 * Time: 22:42
 */

namespace Models;

use Core\Model;
use Mappers\AttributeValueMapper;

class AttributeValue extends Model
{
    /**
     * AttributeValue constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->mapper = new AttributeValueMapper();
    }
    /**
     * @var $id
     */
    private $id;
    /**
     * @var $attribute_id
     */
    private $attribute_id;
    /**
     * @var $value
     */
    private $value;
    /**
     * @var $product_id
     */
    private $product_id;
    /**
     * @var AttributeValueMapper
     */
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

    /**
     * Get all attributes for product
     * @param AttributeValue $obj
     * @return array
     */
    public function getAllForProduct(AttributeValue $obj) :array
    {
        return $this->mapper->getAttributeValue($obj);
    }
}
