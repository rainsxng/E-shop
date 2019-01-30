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
var_dump($user);
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3 ">
            <div class="list-group ">
                <a href="#" class="list-group-item list-group-item-action active">Сменить пароль</a>
                <a href="#" class="list-group-item list-group-item-action">User Management</a>
                <a href="#" class="list-group-item list-group-item-action">Used</a>
                <a href="#" class="list-group-item list-group-item-action">Enquiry</a>
                <a href="#" class="list-group-item list-group-item-action">Dealer</a>
                <a href="#" class="list-group-item list-group-item-action">Media</a>
                <a href="#" class="list-group-item list-group-item-action">Post</a>
                <a href="#" class="list-group-item list-group-item-action">Category</a>
                <a href="#" class="list-group-item list-group-item-action">New</a>
                <a href="#" class="list-group-item list-group-item-action">Comments</a>
                <a href="#" class="list-group-item list-group-item-action">Appearance</a>
                <a href="#" class="list-group-item list-group-item-action">Reports</a>
                <a href="#" class="list-group-item list-group-item-action">Settings</a>


            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Настройки</h4>
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
    </div>
</div>
</body>
</html>
