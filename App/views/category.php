<?php
include_once '../App/views/header.php';
?>
<div class="container">
    <div class="row align-items-end">
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
                                <a href="brands/<?=$product->getBrandId(); ?>"><?=$product->getBrand(); ?></a>
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
    <?php
    include_once '../App/views/footer.html';
    ?>
</body>
</html>