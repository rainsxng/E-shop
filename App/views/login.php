<?php
include '../App/views/header.php';
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
                        <input type="text" class="form-control form-control-lg" placeholder="Имя пользователя" id="loginText">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" placeholder="Пароль" id="pswdText">
                    </div>
                    <a href="/register" class="btn btn-outline-light btn-block">Регистрация</a>
                    <input type="button" class="btn btn-outline-light btn-block" name="signinbtn" value="Вход" onclick="AjaxLogin()">
            </div>
        </div>
    </div>
</form>
</body>
</html>