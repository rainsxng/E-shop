<?php
return [
    '/' => 'Controllers\IndexController/actionIndex', // главная страница
    '/product/:num' => 'Controllers\ProductController/viewProduct/$1',
    '/login'=>'Controllers\ShowController/showLoginPage',
    '/register'=>'Controllers\ShowController/showRegisterPage',
    '/cart'=>'Controllers\ShowController/showCart',
    '/category/:num'=>'Controllers\ProductController/getProductsByCategoryId/$1',
];