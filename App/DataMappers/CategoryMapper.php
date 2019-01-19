<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 04.01.2019
 * Time: 17:48
 */

namespace Mappers;

use Core\Database;
use Models\Category;
use PDO;

class CategoryMapper
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }
    public function getAllCategories()
    {
        $query = $this->pdo->query('SELECT id,name FROM categories');
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        $categories = [];
        foreach ($row as $r)
            array_push($categories, $this->mapArrayToCategory($r));
        return $categories;
    }
    private function mapArrayToCategory($data) {
        $category = new Category();
        $category->setId($data['id']);
        $category->setName($data['name']);
        return  $category;
    }
}
