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
    /**
     * Prepare Product before validation (delete whitespaces, slashes etc)
     * @param Product $product
     * @return Product
     */
    public static function prepare(Product $product) :Product
    {
        $product->setId(trim($product->getId()));
        $product->setId(stripslashes($product->getId()));
        $product->setId(htmlspecialchars($product->getId()));
        $product->setId(preg_replace('/\s/', '', $product->getId()));
        return $product;
    }

    /**
     * Validate product id
     * @param $id
     * @return bool
     */
    public static function validateProductId($id) :bool
    {
        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            return false;
        }
        return true;
    }
}
