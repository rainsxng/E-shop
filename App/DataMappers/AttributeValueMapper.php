<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 26.01.2019
 * Time: 22:53
 */

namespace Mappers;

use Core\Database;
use Models\AttributeValue;
use PDO;


class AttributeValueMapper
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
     * Get values of all attributes
     * @param AttributeValue $obj
     * @return array
     */
    public function getAttributeValue(AttributeValue $obj)
    {
        $query = $this->pdo->prepare("SELECT av.id,av.value,av.created_at,av.updated_at,
        av.product_id,attribute.id as attribute_id
        FROM attribute_value av
        JOIN attribute ON av.attribute_id = attribute.id
        WHERE av.product_id = :id
        ORDER BY attribute_id ASC ;");
        $query->execute(array('id'=>$obj->getProductId()));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $values = [];
        foreach ($row as $r) {
            array_push($values, $this->mapArrayToAttrValues($r));
        }
        return $values;
    }

    /**
     * Transform an array into an AttributeValue Object
     * @param $data
     * @return AttributeValue
     */
    public function mapArrayToAttrValues($data)
    {
        $avObj = new AttributeValue();
        $avObj->setId($data['id']);
        $avObj->setValue($data['value']);
        $avObj->setProductId($data['product_id']);
        $avObj->setAttributeId($data['attribute_id']);
        $avObj->setCreatedAt($data['created_at']);
        $avObj->setUpdatedAt($data['created_at']);
        return $avObj;
    }
}
