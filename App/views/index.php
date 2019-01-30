<?php
include "../App/views/header.php";
?>
<div class="container">
    <div class="row justify-content-center ml-auto mt-4" id="popularLabel">
        <p>Популярные товары</p>
    </div>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Категории</div>
                <ul class="list-group category_block">
                    <?php foreach ($categories as $category) {?>
                    <li class="list-group-item"><a href="/category/<?=$category->getCategoryId();?>"><?=$category->getCategoryName();?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="mb-4">
                    <div class="card">
                        <article class="card-group-item">
                            <header class="card-header">
                                <h6 class="title">Бренд </h6>
                            </header>
                            <div class="filter-content">
                                <div class="card-body">
                                    <form>
                                        <?php foreach ($brands as $brand) { ?>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?=$brand->getName();?>" name="brands[]">
                                            <span class="form-check-label">
                                    <?=$brand->getName();?>
                                            </span>
                                        </label> <!-- form-check.// -->
                                        <?php } ?>
                                        <button type="button" class="btn btn-primary" id="showBtn" disabled>Показать</button>
                                    </form>
                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- card-group-item.// -->

                    </div> <!-- card.// -->

            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Последнее поступление</div>
                <div class="card-body">
                    <img class="img-fluid" src="https://images-na.ssl-images-amazon.com/images/I/61i6nJPskCL._SX425_.jpg"/>
                    <a href="product/1"><h5 class="card-title">Grado PS1000e</h5></a>
                    <p class="btn btn-danger btn-block">1695$</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <?php foreach ($items as $product) { ?>
                <div class="col-12 col-md-6 col-lg-4 mt-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="<?=$product->getImage();?>" alt="Card image cap">
                        <div class="card-body">
                            <a href="brands/<?=$product->getBrandId(); ?>"><?=$product->getBrand(); ?></a>
                            <h4 class="card-title"><a href="product/<?=$product->getId(); ?>" title="View Product"><?=$product->getName(); ?></a></h4>
                                 <a href="/category/<?=$product->getCategoryId(); ?>"><?=$product->getCategory(); ?></a>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block"><?=$product->getPrice(); ?>$</p>
                                </div>
                                <?php if ($product->getQuantity()<=0) {  ?>
                                    <div class="col">
                                        <a class="btn btn-secondary btn-block" id="zero">Нет в наличии</a>
                                    </div>
                                <?php } else { ?>
                                <div class="col">
                                    <a class="btn btn-success btn-block" id="addBtn" onclick="AjaxAddToCart(<?=$product->getId(); ?>)">Добавить в корзину</a>
                                </div>
                            <?php } ?>
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
</body>
</html>