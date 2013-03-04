<?php

$i = 3;
switch ($i) {
    case 0:
        echo 'i == 0';
        break;
    case 1:
        echo 'i == 1';
        break;
    case 2:
        echo 'i == 2';
        break;
    case 3:
    case 4:
        echo 'i == 3 ou 4';
        break;
    default :
        echo "i == $i";
}


