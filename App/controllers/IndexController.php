<?php

namespace Controllers;

use Core\Controller;
use Core\Response;
use Core\Router;
use Models\Brand;
use Models\Category;
use Models\Product;
use Models\ProductModel;
use Models\CategoryModel;

class IndexController extends Controller
{
    /**
     * @var Category $CategoryModel
     */
    private $CategoryModel;
    /**
     * @var Product $ProductModel
     */
    private $ProductModel;
    /**
     * @var Brand $BrandModel
     */
    private $BrandModel;
    public function __construct()
    {
        $this->CategoryModel = new Category();
        $this->ProductModel = new Product();
        $this->BrandModel = new Brand();
    }

    /**
     * Render index page with all products and categories
     * @return bool
     * @throws \Exception
     */
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

    /**
     * Filter products by chosen brands
     * @return bool
     * @throws \Exception
     */
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

    /**
     * Get searched  products
     */
    public function searchProductsByTitle()
    {
        $products = $this->ProductModel->getSearchProducts($_POST['query']);
        echo json_encode($products);
    }

    public function fullSearch()
    {
        $categories = $this->CategoryModel->getAllCategories();
        $products = $this->ProductModel->getSearchProducts($_POST['query']);
        $brands = $this->BrandModel->getAllBrands();
        return self::render(
            'index',
            ['items'=>$products,'categories'=>$categories,'brands'=>$brands]
        );
    }
}
