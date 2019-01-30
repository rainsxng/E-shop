<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <script src="/js/notify.js"></script>
    <script src="/js/auth.js"></script>
    <script src="/js/User.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <title>Настройки</title>
</head>
<body>
<?php
include_once '../App/views/header.php';
?>
<div class="row">
    <div class="col-3">

    </div>

</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 tab-container">
            <div class="list-group ">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-about-tab" data-toggle="pill" href="#v-pills-about" role="tab" aria-controls="v-pills-about" aria-selected="true">Информация</a>
                    <a class="nav-link" id="v-pills-changePswd-tab" data-toggle="pill" href="#v-pills-changePswd" role="tab" aria-controls="v-pills-changePswd" aria-selected="false">Сменить пароль</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Сменить email</a>
                    <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">Заказы</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Опасная зона</a>
                </div>
            </div>
        </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-about" role="tabpanel" aria-labelledby="v-pills-about-tab">1</div>
                    <div class="tab-pane fade" id="v-pills-changePswd" role="tabpanel" aria-labelledby="v-pills-changePswd-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>Смена пароля</h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form method="post">
                                            <div class="form-group row">
                                                <label for="oldPswd" class="col-4 col-form-label">Старый пароль</label>
                                                <div class="col-8">
                                                    <input id="oldPswd" name="oldPswd" placeholder="Старый пароль" class="form-control here" required="required" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="newPswd" class="col-4 col-form-label">Новый пароль</label>
                                                <div class="col-8">
                                                    <input id="newPswd" name="newPswd" placeholder="Новый пароль" class="form-control here" type="password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-4 col-8">
                                                    <button  type="button" id="updatePswdBtn"  class="btn btn-primary">Сохранить</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">3</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">4</div>
                    <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">5</div>
                </div>
            </div>
    </div>
</div>
</body>
</html>
