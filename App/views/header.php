<?php
use Controllers\AuthController;
$controller = new AuthController();
?>
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
        <div class="btn-group mr-5">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?=$controller->getLogin()?>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/user">Настройки</a>
                <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="" name="logout" onclick="AjaxLogout()">Выход</a>
            </div>
        </div>


            <?php
    } else {
        echo '<a href="/login" class="btn btn-primary float-left ml-1 mr-2"><i class="fas fa-sign-in-alt"></i>  Войти</a>' ;
    }
        ?>
        </form>
    </div>
</nav>