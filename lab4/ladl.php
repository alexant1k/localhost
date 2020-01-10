<?php
$st_strpos = " З";
$st_search = "3.txt";
echo "Результат поиска в файле $st_search: <br>";
if (strpos(file_get_contents("3.txt"), "$st_strpos")) echo str_replace(" 3", "!", $st_strpos);
