<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Корзина</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<?php
include_once '../App/views/header.php';
?>
<div class="container-flued">
    <?php foreach ($items as $key=>$value) {
    ?>
    <div class="row  align-items-center">
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
                    <span><?=$items[$key]['price'];?></span>
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
                    <div class="btn btn-primary btn-sm ml-5"><i class="fas fa-trash-alt"></i></div>
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
        </div>
    </div>
    <div class="col-lg-2">
        <span>200$</span>
    </div>
</div>
</div>
</body>
</html>