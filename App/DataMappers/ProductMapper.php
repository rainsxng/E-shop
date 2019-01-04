<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 04.01.2019
 * Time: 17:48
 */

namespace Mappers;
use Core\DBWrapper;

class ProductMapper extends DBWrapper
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = parent::__construct();
    }
    public function getAllProducts(){
        $query = $this->pdo->query('SELECT * FROM brands');
        while ($row = $query->fetch()){
            echo $row['name']."\n";
        }
    }
}