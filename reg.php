<!DOCTYPE html>
<html lang="ru">
<head>
<?php
$website_title = "Регистрация на сайте";
require 'blocks/head.php';
?>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Купимстатью</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="/">Главная</a
    </nav>
    <a class="btn btn-outline-primary" href="#">Войти</a>
</div>
<div class="container nt-5"
<h4 class="nb-5"></h4>
<h4>Форма регистрации</h4>
<form action="reg/regmethod.php" method="post">
    <label for="username">Ваше имя</label>
    <input type="text" name="username" id="username" class="form-control">

    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control">

    <label for="login">Логин</label>
    <input type="text" name="login" id="login" class="form-control">

    <label for="password">Пароль</label>
    <input type="password" name="pass" id="pass" class="form-control">

    <button type="submit" class="btn btn-success mt-5">
        Зарегистрироваться </button>
</form>
</div>
</div>
</body>
</html>



