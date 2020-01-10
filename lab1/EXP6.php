<?php
$Xa = 377;
$Xb = 377;
$Ya = 366;
$Yb = 688;
$x = sqrt(($Xa*$Xa)+($Ya*$Ya));
$y = sqrt(($Xb*$Xb)+ ($Yb*$Yb));
if ($x > $y)
    echo $y;
    else
        echo $x;










