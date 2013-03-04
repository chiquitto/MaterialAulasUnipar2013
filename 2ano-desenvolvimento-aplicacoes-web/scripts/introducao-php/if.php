<?php

$expressao = TRUE;
if ($expressao) {
    // bloco de instrucoes
}

$a = 4;
$b = 3;
if ($a > $b) {
    echo "A é maior que B";
}


$c = (5 > 6);
if ($c) {
    echo 'C é verdadeiro';
}

if ($d = (15 > 10)) {
    echo 'D é TRUE';
}



if ($expressao) {
    // bloco de instrucoes
}
else {
    // executado se $expressao é FALSE
}



$expr = TRUE;
$expr2 = TRUE;

if ($expr) {
    // instrucoes
}
else {
    if ($expr2) {
        // instrucoes
    }
    else {
        // instrucoes
    }
}

if ($expr) {
    // instrucoes
}
elseif ($expr2) {
    // instrucoes
}
else {
    // instrucoes
}