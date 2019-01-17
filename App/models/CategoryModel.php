<?php
/**
 * Created by PhpStorm.
 * User: phpstudent
 * Date: 10.12.18
 * Time: 17:56
 */
namespace Models;

use Core\Model;
use Mappers\CategoryMapper;

class CategoryModel extends Model
{
    public function getCategories()
    {
        $mapper = new CategoryMapper();
        return $mapper->getAllCategories();
    }
}
