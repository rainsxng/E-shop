<?php

namespace Models;


use Core\Model;
use Mappers\AttributeMapper;
use Mappers\BrandMapper;

class Brand extends Model
{
    private $id;
    private $name;
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

    public function __construct()
    {
        parent::__construct();
        $this->mapper = new BrandMapper();
    }

    public function getAllBrands()
    {
        return $this->mapper->getAllBrands();
    }
}