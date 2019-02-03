<?php

namespace Models;

use Core\Model;
use Mappers\AttributeMapper;
use Mappers\BrandMapper;

class Brand extends Model
{
    /**
     * Brand constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->mapper = new BrandMapper();
    }
    /**
     * @var $id
     */
    private $id;
    /**
     * @var $name
     */
    private $name;
    /**
     * @var BrandMapper
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
     * Get all brands from database
     * @return array
     */
    public function getAllBrands() :array
    {
        return $this->mapper->getAllBrands();
    }
}
