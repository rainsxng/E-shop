<?php

namespace Models;


use Core\Model;
use Mappers\AttributeMapper;

class Attribute extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->mapper = new AttributeMapper();
    }
    /**
     * @var mixed $id
     */
    private $id;
    /**
     * @var mixed $name
     */
    private $name;
    /**
     * @var AttributeMapper $mapper
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
     * Get all attributes from database
     * @return array
     */
    public function getAllAttributes() :array
    {
        return $this->mapper->getAllAttributes();
    }

    /**
     * @param $atObj
     * @return bool
     */
    public function insert($atObj)
    {
        return $this->mapper->insert($atObj);
    }

    /**
     * @param $atObj
     * @return bool
     */
    public function delete($atObj)
    {
        return $this->mapper->delete($atObj);
    }

    /**
     * @param $atObj
     * @return bool
     */
    public function update($atObj)
    {
        return $this->mapper->update($atObj);
    }
}
