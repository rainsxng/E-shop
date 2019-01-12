<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="/js/DeleteFromCart.js"></script>
</head>
<body>
<?php
include_once '../App/views/header.php';
if ($items['Summary']!==NULL){ ?>
<div class="container-flued">
    <?php foreach ($items as $key=>$value) {
        if ($key==='Summary') continue;
    ?>
    <div class="row  align-items-center ml-5">
        <div class="col">
            <img src="<?=$items[$key]['image'];?>" alt="Product photo"
                 height="200px">
        </div>
        <div class="col">
            <span>Название товара</span>
            <div class="row">
                <div class="col">
                    <div><?=$items[$key]['name'];?></div>
                </div>
            </div>
        </div>
        <div class="col">
            <span>Цена товара</span>
            <div class="row">
                <div class="col">
                    <span><?=$items[$key]['price'];?> $</span>
                </div>
            </div>
        </div>
        <div class="col">
            <span>Количество</span>
            <div class="row">
                <div class="col">
                    <span><?= $items[$key]['quantity']; ?></span>
                </div>
            </div>
        </div>
        <div class="col">
            <span>Сумма</span>
            <div class="row">
                <div class="col">
                    <span><?=$items[$key]['summ'];?> $</span>
                    <div class="btn btn-primary btn-sm ml-5" onclick="DeleteOneFromCart(<?=$items[$key]['id'];?>)"><i class="fas fa-trash-alt"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
        <?php
        }
 ?>

<div class="row">
    <div class="col-lg-10 text-right">
        <span>Общая сумма</span>
        <div class="row ml-5 text-center">
            <div class="col-lg-5">

            </div>
            <div class="col-lg-2">
                <div class="btn btn-primary">Оформить заказ</div>
            </div>
            <div class="col-lg-2">
                <div class="btn btn-primary" onclick="DeleteAllFromCart()">Очистить корзину</div>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <span><?=$items['Summary'];?> $</span>
    </div>
</div>
</div>
<?php } else { ?>
    <div class="col mx-auto text-center">
        <h1>Корзина пустая</h1>
        <a href="/" class="btn btn-primary btn-lg mt-4">За покупками</a>
    </div>

<?php } ?>
</body>
</html>