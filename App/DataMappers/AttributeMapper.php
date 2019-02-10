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
use PHPUnit\Runner\Exception;


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

    /**
     * @param Attribute $atObj
     * @return bool
     */
    public function insert(Attribute $atObj)
    {
        $query = $this->pdo->prepare("INSERT INTO attribute VALUES (:id,:name,:created_at,:updated_at);");
        try {
            $query->execute(array(
                'id' => $atObj->getId(),
                'name' => $atObj->getName(),
                'created_at' => $atObj->getCreatedAt(),
                'updated_at' => $atObj->getUpdatedAt()));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param Attribute $atObj
     * @return bool
     */
    public function delete(Attribute $atObj)
    {
        $name = $atObj->getName();
        $name = "%$name%";
        $query = $this->pdo->prepare("DELETE FROM attribute WHERE attribute.id = :id OR name LIKE :name;");
        try {
            $query->execute(array(
                'id' => $atObj->getId(),
                'name'=>$name
            ));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param Attribute $atObj
     * @return bool
     */
    public function update(Attribute $atObj)
    {
        $query = $this->pdo->prepare("UPDATE attribute SET name = :name, updated_at = :updated_at
        WHERE attribute.id = :id;");
        try {
            $query->execute(array(
                'id' => $atObj->getId(),
                'name'=>$atObj->getName(),
                'updated_at'=>$atObj->getUpdatedAt()
            ));
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param string $name
     * @return bool|Attribute
     */
    public function getAttributeByName(string $name)
    {
        $name = "%$name%";
        $query = $this->pdo->prepare("SELECT id,name,created_at,updated_at FROM attribute WHERE  name LIKE :name");
        try {
            $query->execute(array(
                'name' => $name
            ));
            $row = $query->fetchALL(PDO::FETCH_ASSOC);
            $attribute = $this->mapArrayToAttributes($row[0]);
            return $attribute;
        } catch (Exception $e) {
            return false;
        }
    }
}
