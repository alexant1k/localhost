<?php
$string = "У нас есть большое слово"."<br />";
file_put_contents("test.txt", "$string");
echo str_replace("слово", "arbuz", $string);




