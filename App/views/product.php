<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <title><?=$product->getBrand().' '.$product->getName();?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="/js/notify.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="/js/addToCart.js"></script>
    <script src="/js/Comments.js"></script>
</head>
<body>
<?php
include "../App/views/header.php";
?>
<div class="container-flued">
    <div class="row ">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/category/<?=$product->getCategoryId();?>"><?=$product->getCategory(); ?></a> / <?=$product->getBrand().' '.$product->getName(); ?></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container-flued ml-4 mb-4">
    <div class="row mr-4">
        <div class="col-md-4">
            <img src="<?=$product->getImage(); ?>" alt="Product photo" height="450px">
        </div>
        <div class="col">
            <p><?=$product->getBrand(); ?></p>
            <p><?=$product->getName(); ?></p>
            <div class="row">
                <div class="col">
                    <?php for ($i=1;$i<=5;$i++){ ?>
                    <span class="fa fa-star checked"></span>
                   <?php }?>
                    <div class="row">
                        <div class="col align-self-center">
                            <div><?=$product->getPrice(); ?>$</div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col">
                            <?php if ($product->getQuantity()>=1) { ?>
                            <div class="form-group">
                                <label for="quantity" class="control-label">Количество</label>
                                <input type="number" name="name" class="form-control" id="quantity" value="1">
                                <div class="row mb-4">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary align-self-center mt-2" onclick="AjaxAddToCart(<?=$product->getId();?>)">Купить</button>
                                    </div>
                                </div>
                            </div>
                            <?php  } else {  ?>
                            <a class="btn btn-secondary mb-5" id="zero">Нет в наличии</a>
                            <?php } ?>
                        </div>
                    </div>
                <div class="row content-justify-center">
                        <div class="col">
                            <?=$product->getDescription(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Характеристики</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Отзывы(<?=$count;?>)</a>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">1</div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row ml-5">
            <div class="col-md-6 col-md-offset-2 col-sm-12">
                <div class="comment-wrapper">
                    <div class="panel panel-info">
                        <div class="panel-heading mt-2 mb-4">
                           Добавить отзыв
                        </div>
                        <div class="form-group">
                            <label for="estimate" class="control-label">Оценка (1-5)</label>
                            <input type="number" name="name" class="form-control" id="estimate" value="1">
                            <div class="row mb-4">
                            </div>
                          </div>
                         </div>
                        </div>
                        <div class="panel-body">
                            <textarea class="form-control" id="commentMessage" placeholder="Напишите отзыв" rows="3"></textarea>
                            <br>
                            <button type="button" class="btn btn-info pull-right" onclick="AddComment(<?=$product->getId();?>,<?=$_SESSION['user_id'];?>)">Добавить</button>
                            <div class="clearfix"></div>
                            <hr>
                            <ul class="media-list">
                                <?php if ($count!=0) {
                                 foreach ($comments as $comment) { ?>
                                <li class="media">
                                    <a  class="pull-left mr-5">
                                        <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                                    </a>
                                    <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted"> <?=$comment->getDate(); ?></small>
                                </span>
                                        <strong class="text-success"><?=$comment->getUserLogin(); ?></strong>
                                        <p>
                                        <p><?=$comment->getStars(); ?></p>
                                            <?=$comment->getMessage(); ?>
                                        </p>
                                    </div>
                                </li>
                                <?php }  }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<footer class="mt-5">
    <?php include "../App/views/footer.html";?>
</footer>
</body>
</html>