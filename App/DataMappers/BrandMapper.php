<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 26.01.2019
 * Time: 22:53
 */

namespace Mappers;

use Core\Database;
use Models\Brand;
use PDO;


class BrandMapper
{
    /**
     * @var PDO $pdo
     */
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    /**
     * Get info about all brands
     * @return array
     */
    public function getAllBrands() :array
    {
        $query = $this->pdo->prepare("SELECT id,name,created_at,updated_at from brands");
        $query->execute();
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $brands= [];
        foreach ($row as $r) {
            array_push($brands, $this->mapArrayToBrand($r));
        }
        return $brands;
    }

    /**
     * Transform an array into an Brand Object
     * @param $data
     * @return Brand
     */
    public function mapArrayToBrand($data) :Brand
    {
        $obj = new Brand();
        $obj->setId($data['id']);
        $obj->setName($data['name']);
        $obj->setCreatedAt($data['created_at']);
        $obj->setUpdatedAt($data['created_at']);
        return $obj;
    }
}
