<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 26.01.2019
 * Time: 22:53
 */

namespace Mappers;

use Core\Database;
use Models\Attribute;
use PDO;


class AttributeMapper
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
     * Get info about all attributes
     * @return array
     */
    public function getAllAttributes()
    {
        $query = $this->pdo->prepare("SELECT id,name,created_at,updated_at from attribute");
        $query->execute();
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $attributes= [];
        foreach ($row as $r) {
            array_push($attributes, $this->mapArrayToAttributes($r));
        }
        return $attributes;
    }

    /**
     *Transform an array into an Attribute Object
     * @param $data
     * @return Attribute
     */
    public function mapArrayToAttributes($data)
    {
        $atObj = new Attribute();
        $atObj->setId($data['id']);
        $atObj->setName($data['name']);
        $atObj->setCreatedAt($data['created_at']);
        $atObj->setUpdatedAt($data['created_at']);
        return $atObj;
    }
}
