<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 04.01.2019
 * Time: 17:48
 */

namespace Mappers;
use Core\DBWrapper;
use PDO;

class CategoryMapper extends DBWrapper
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = parent::__construct();
    }
    public function getAllCategories(){
        $query = $this->pdo->query('SELECT name FROM categories');
        $row = $query->fetchALL(PDO::FETCH_COLUMN);
        var_dump($row);
        return $row;
    }
}