<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <title>Онлайн магазин</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="/js/notify.js"></script>
    <script src="/js/auth.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="/js/addToCart.js"></script>
</head>
<body>
<?php
include_once '../App/views/header.php';
?>
<div class="container">
<div class="container mt-4">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Топ продаж</div>
                <div class="card-body">
                    <img class="img-fluid" src="https://images-na.ssl-images-amazon.com/images/I/816fXIY2whL._SX425_.jpg"/>
                    <h5 class="card-title">Sony MDR1000X/B</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, porro?</p>
                    <p class="bloc_left_price">99$</p>
                </div>
            </div>
        </div>
        <div class="col">
            <span id="popularLabel">Категория: <?=$products[0]->getCategory();?></span>
            <div class="row">
                <?php foreach ($products as $product) { ?>
                    <div class="col-12 col-md-6 col-lg-4 mt-4 mb-3">
                        <div class="card">
                            <img class="card-img-top" src="<?=$product->getImage(); ?>" alt="Card image cap">
                            <div class="card-body">
                                <p><?=$product->getBrand();?></p>
                                <h4 class="card-title"><a href="/product/<?=$product->getId();?>" title="View Product"><?=$product->getName(); ?></a></h4>
                                <div class="row">

                                    <div class="col">
                                        <p class="btn btn-danger btn-block"><?=$product->getPrice(); ?>$</p>
                                    </div>
                                    <div class="col">
                                        <a class="btn btn-success btn-block" onclick="AjaxAddToCart(<?=$product->getId(); ?>)">Добавить в корзину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>

    </div>
</div>
    <?php
    include_once '../App/views/footer.html';
    ?>
</body>
</html>