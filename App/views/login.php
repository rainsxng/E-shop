<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8">
        <title>Страница входа</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
<body>
<?php
include_once '../App/views/header.php';
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
                <h3>Вход в аккаунт</h3>
                <p>Для входа заполните поля ниже</p>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-lg" placeholder="Имя пользователя" name="loginText">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" placeholder="Пароль" name="pswdText">
                    </div>
                    <a href="/register" class="btn btn-outline-light btn-block">Регистрация</a>
                    <input type="submit" class="btn btn-outline-light btn-block" name="signinbtn" value="Вход">
            </div>
        </div>
    </div>
</form>
</body>
</html>