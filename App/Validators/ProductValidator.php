<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 27.01.2019
 * Time: 12:00
 */

namespace Validators;

use Core\Response;
use Models\Product;

class ProductValidator
{
    public static function prepare(Product $product)
    {
        $product->setId(trim($product->getId()));
        $product->setId(stripslashes($product->getId()));
        $product->setId(htmlspecialchars($product->getId()));
        $product->setId(preg_replace('/\s/', '', $product->getId()));
        return $product;
    }
    public static function validateProduct_id($id)
    {
        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            return 0;
        }
        return 1;
    }
}
