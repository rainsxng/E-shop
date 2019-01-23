<?php
return [
    '/' => 'Controllers\IndexController/actionIndex', // главная страница
    '/product/:num' => 'Controllers\ProductController/viewProduct/$1',
    '/login'=>'Controllers\ShowController/showLoginPage',
    '/register'=>'Controllers\ShowController/showRegisterPage',
    '/cart'=>'Controllers\CartController/getCartProducts',
    '/category/:num'=>'Controllers\ProductController/getProductsByCategoryId/$1',
    '/cart/add'=>'Controllers\CartController/addToCart',
    '/cart/deleteOne'=>'Controllers\CartController/deleteOne',
    '/cart/deleteAll'=>'Controllers\CartController/deleteAll',
    '/cart/increase'=>'Controllers\CartController/increaseByOne',
    '/cart/decrease'=>'Controllers\CartController/decreaseByOne',
    '/auth/register'=>'Controllers\AuthController/registration',
    '/auth/login'=>'Controllers\AuthController/authorize',
    '/auth/logout'=>'Controllers\AuthController/logOut'
];
