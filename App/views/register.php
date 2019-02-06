<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Cache-control" content="no-cache">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="Expires" content="-1">
        <title>Страница регистрации</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="/js/notify.js"></script>
        <script src="/js/typeahead.bundle.js"></script>
        <script src="/js/search.js"></script>
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <script src="/js/auth.js"></script>
    </head>
<body>
<?php
include_once 'header.php';
?>
<form method="post">
    <div class="container-flued">
        <div class="row ">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Главная</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Страница входа</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-lg-4" id="fluent-container">
        <div class="card bg-primary text-center card-form">
            <div class="card-body">
                <h3>Регистрация</h3>
                <p>Для регистрации заполните поля ниже</p>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Имя пользователя" id="loginText">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" placeholder="Электронная почта" id="emailText">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" placeholder="Пароль" id="pswdText">
                    </div>
                    <input type="button" class="btn btn-outline-light btn-block" value="Регистрация" name="registerBtn" onclick="AjaxRegister()">
                    <a href="/login" class="btn btn-outline-light btn-block">Уже зарегистрированы?</a>
                    <div id="message1"></div>
                </form>
            </div>
        </div>
    </div>

</form>
</body>
</html>