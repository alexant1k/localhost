<?php
$fio = $_POST["fio"];
$tovar = $_POST["tovar"];
$goods = $_POST["goods"];
 echo $fio.","." "."Спасибо за заполнение анкеты<br/>";
 echo "Предалагаю проверить введенные данные:<br />";
 echo "Ваше ФИО:".$fio."<br />"."Ваш товар:".$tovar."<br />"."Ваше отношение к товару:".$goods."<br/>";

