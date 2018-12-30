<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sony MDR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<?php
include "../App/views/header.html";
?>
<div class="container-flued">
    <div class="row ">
        <div class="col">
            <?php foreach ($items as $key=>$value) {
            ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../../public/index.php">Главная</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Информация о продукте</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container-flued">
    <div class="row mr-4">
        <div class="col-md-4">
            <img src="<?=$items[$key]['img'];?>" alt="Product photo" height="450px">

        </div>
        <div class="col">
            <p><?=$items[$key]['title'];?></p>
            <div class="row">
                <div class="col">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <div class="row">
                        <div class="col align-self-center">
                            <div><?=$items[$key]['price'];?></div>
                        </div>
                        <div class="col align-self-center">
                            <div>Есть в наличии  <i class="fas fa-check"></i></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary align-self-center mt-2">Купить</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col align-self-center">
                            <div class="description"><?=$items[$key]['text'];?></div>
                        </div>
                    </div>
                <div class="row content-justify-center">
                        <div class="col">
                            <?=$items[$key]['description'];?>
                                <ul>
                                    <li>Эти наушники анализируют ваши предпочтения и индивидуальные особенности, адаптируя звук под них.</li>
                                    <li>Функция «Быстрое внимание» - Общайтесь, не снимая наушников: просто положите руку на корпус, и громкость мгновенно снизится.</li>
                                    <li>Режим окружающего звука (голосовой режим) - Наслаждайтесь музыкой без помех, не упуская при этом ничего важного</li>
                                    <li>Режим окружающего звука (голосовой режим) - Наслаждайтесь музыкой без помех, не упуская при этом ничего важного</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <?php }?>
    <div class="row ml-5">
        <div class="col">
            <div class="description">Технические характеристики</div>
        </div>
    </div>
    <div class="row mx-5">
        <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Характеристика</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Характеристика</th>
                    <th scope="col">Описание</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">Lorem ipsum dolor sit amet.</th>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit amet.</td>

                </tr>
                <tr>
                    <th scope=/"row">Lorem ipsum dolor sit amet.</th>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit amet.</td>

                </tr>
                <tr>
                    <th scope="row">Lorem ipsum dolor sit amet.</th>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit amet.</td>

                </tr>
                <tr>
                    <th scope="row">Lorem ipsum dolor sit amet.</th>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit amet.</td>

                </tr>
                <tr>
                    <th scope="row">Lorem ipsum dolor sit amet.</th>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit amet.</td>
                    <td>Lorem ipsum dolor sit amet.</td>

                </tr>
                </tbody>
            </table>
        </div>
    </div>



<?php include "../App/views/footer.html";?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
</body>
</html>