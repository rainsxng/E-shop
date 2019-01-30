<?php

namespace Controllers;

use Core\Controller;
use Core\Router;
use Models\Brand;
use Models\Category;
use Models\Product;
use Models\ProductModel;
use Models\CategoryModel;

class IndexController extends Controller
{
    private $CategoryModel;
    private $ProductModel;
    private $BrandModel;
    public function __construct()
    {
        $this->CategoryModel = new Category();
        $this->ProductModel = new Product();
        $this->BrandModel = new Brand();
    }

    public function actionIndex()
    {
        $categories = $this->CategoryModel->getAllCategories();
        $products = $this->ProductModel->getAllProducts();
        $brands = $this->BrandModel->getAllBrands();
        return self::render(
            'index',
            ['items'=>$products,'categories'=>$categories,'brands'=>$brands]
        );
    }

    public function showBrandsProducts()
    {
        $brandList = substr(strstr($_SERVER['REQUEST_URI'], '='), 1, strlen($_SERVER['REQUEST_URI']));
        $categories = $this->CategoryModel->getAllCategories();
        $products = $this->ProductModel->getProductsByBrand($brandList);
        $brands = $this->BrandModel->getAllBrands();
        return self::render(
            'index',
            ['items'=>$products,'categories'=>$categories,'brands'=>$brands]
        );
    }
}
