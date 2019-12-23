<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href ="css/style.css">
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Инфантьев_вебсайт</title>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Купимстатью</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Главная</a>
        <a class="p-2 text-dark" href="#">Контакты</a>
    </nav>
    <a class="btn btn-outline-primary" href="#">Войти</a>
</div>
<div class="container nt-5"
  <h4 class="nb-5">Статьи для покупки</h4>
<! -- делаем, что бы блоки были в одной строке -->
<div class="d-flex flex-wrap">
<?php
     for($i = 0; $i <3; $i++):
         ?>
<div class="card mb-4 shadow-sm">
    <div class="card-header">
        <h4 class="my-0 font-weight-normal">Статьи</h4>
    </div>
    <div class="card-body">
        <img src ="img/<?php echo ($i + 1) ?>.jpg" class="img-thumbnail">
        <ul class="list-unstyled mt-3 mb-4">
            <li>Если данная статья вас заинтересовала нажми на кнопку "Подробнее"</li>
        </ul>
        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Подробнее</button>
    </div>
</div>
<?php endfor; ?>
</div>
</div>
</body>
</html>


