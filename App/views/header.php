<?php
use Controllers\AuthController;
$controller = new AuthController();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <title><?=$title;?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="/js/notify.js"></script>
    <script src="/js/Comments.js"></script>
    <script src="/js/auth.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src="/js/addToCart.js"></script>
    <script src="/js/filter.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Rainsxng</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor03 ">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline" method="post">
            <div class="col align-self-center">
                <input class="form-control mr-sm-2" type="text" placeholder="Поиск">
                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
            </div>
            <a href="/cart" class="btn btn-primary float-left mr-2"><i class="fas fa-shopping-cart"></i>   Корзина</a>
            <?php
    if ($_SESSION['isLogged'] === true) {
        ?>
        <div class="pull-right">
            <ul class="nav pull-right">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, User <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="/user/preferences"><i class="icon-cog"></i> Preferences</a></li>
                        <li><a href="/help/support"><i class="icon-envelope"></i> Contact Support</a></li>
                        <li class="divider"></li>
                        <li><a href="/auth/logout"><i class="icon-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
            <?php
    } else {
        echo '<a href="/login" class="btn btn-primary float-left ml-1 mr-2"><i class="fas fa-sign-in-alt"></i>  Войти</a>' ;
    }
        ?>
        </form>
    </div>
</nav>