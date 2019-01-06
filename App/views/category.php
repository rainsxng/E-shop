<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Категория</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <?php
    include_once '../App/views/header.php';
    ?>
<div class="container">
    <div class="row align-items-end">
        <div class="col-lg-5 text-right ml-5" style="font-size: 20px">
            <span id="popularLabel2">Категория: <?=$items[0]['Category'];?></span>
        </div>
        <div class="col text-right mr-3 mt-4">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Сортировка
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                </div>
            </div>
        </div>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Топ продаж</div>
                <div class="card-body">
                    <img class="img-fluid" src="https://images-na.ssl-images-amazon.com/images/I/816fXIY2whL._SX425_.jpg" />
                    <h5 class="card-title">Sony MDR1000X/B</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, porro?</p>
                    <p class="bloc_left_price">99$</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <?php foreach ($items as $key=>$value) {
                ?>
                    <div class="col-12 col-md-6 col-lg-4 mt-4 mb-3">
                        <div class="card">
                            <img class="card-img-top" src="<?=$items[$key]['image'];?>" alt="Card image cap">
                            <div class="card-body">
                                <a href="brands/<?=$items[$key]['brand_id'];?>"><?=$items[$key]['Brand'];?></a>
                                <h4 class="card-title"><a href="product/<?=$items[$key]['id'];?>" title="View Product"><?=$items[$key]['name'];?></a></h4>
                                <a href="/category/<?=$items[$key]['category_id'];?>"><?=$items[$key]['Category'];?></a>
                                <p class="card-text"><?=$items[$key]['short_desc'];?></p>
                                <div class="row">

                                    <div class="col">
                                        <p class="btn btn-danger btn-block"><?=$items[$key]['price'];?>$</p>
                                    </div>
                                    <div class="col">
                                        <a href="#" class="btn btn-success btn-block">Добавить в корзину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <div class="col-12">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Назад</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>

                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Вперёд</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
    <?php
    include_once '../App/views/footer.html';
    ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>