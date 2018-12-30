<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Онлайн магазин</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<?php
include "../App/views/header.html";
?>
<div class="container">

    <div class="row justify-content-center ml-auto" id="popularLabel">
        <p>Популярные товары</p>
    </div>
<div class="container mt-4">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Категории</div>
                <ul class="list-group category_block">
                    <li class="list-group-item"><a href="category.php">Наушники</a></li>
                    <li class="list-group-item"><a href="category.php">Lorem ipsum dolor sit amet.</a></li>
                    <li class="list-group-item"><a href="category.php">Lorem ipsum dolor sit amet.</a></li>
                    <li class="list-group-item"><a href="category.php">PLorem ipsum dolor sit amet.</a></li>
                    <li class="list-group-item"><a href="category.php">Lorem ipsum dolor sit amet.</a></li>
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Последнее поступление</div>
                <div class="card-body">
                    <img class="img-fluid" src="<?=$items[0][1]['img'];?>" />
                    <h5 class="card-title"><?=$items[0][1]['title'];?></h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, porro?</p>
                    <p class="bloc_left_price">99$</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <?php foreach ($items as $key=>$value) {
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">

                        <img class="card-img-top" src="<?=$items[$key]['img'];?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product/<?=$key;?>" title="View Product"><?=$items[$key]['title'];?></a></h4>
                            <p class="card-text"><?=$items[$key]['text'];?></p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?=$items[$key]['price'];?></p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success btn-block">Добавить в корзину</a>
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

<!-- Footer -->
<?php include_once '../App/views/footer.html';?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>