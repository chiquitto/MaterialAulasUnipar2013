<?php

function nomeDaFuncao() {
    // Bloco de código
}

function funcaoComParametro($parametros) {
    // Bloco de código
}

function funcaoComParametros($parametro1, $parametro2) {
    // Bloco de código
}

function escreveOlaMundo() {
    echo "Olá mundo";
}

function escreveOlaNome($nome) {
    echo "Olá $nome";
}

escreveOlaMundo();
echo '<br>';
escreveOlaNome('Zeh');
echo '<br>';

function soma($n1, $n2) {
    echo $n1 + $n2;
}

function hipotenusa($n1, $n2) {
    $c2 = ($n1 * $n1) + ($n2 * $n2);
    $c = sqrt($c2);
    echo $c;
}

echo '<br>';
soma(1,2); // 3
echo '<br>';
hipotenusa(4,3); // 25
echo '<br>';



function soma2($n1, $n2) {
    return $n1 + $n2;
}
echo soma2(5, 3); // 8
echo soma2(1, 2) * soma2(2, 2); // 12


function soma3($n1, $n2) {
    return $n1;
    return $n1 + $n2;
}


function cafeteira ($tipo = "cappuccino") {
    return "Fazendo uma xícara de café $tipo.<br>";
}

// Fazendo uma xicara de café cappuccino.
echo cafeteira ();
// Fazendo uma xicara de café .
echo cafeteira(null);
// Fazendo uma xicara de café expresso.
echo cafeteira ("expresso");


// Errado
function iogurtera1 ($tipo = "azeda", $sabor) {
    return "Fazendo uma taça de $sabor $tipo.<br>";
}

// Certo
function iogurtera2 ($sabor, $tipo = "azeda") {
    return "Fazendo uma taça de $sabor $tipo.<br>";
}

iogurtera1('Framboesa');
iogurtera2('Framboesa');

function imc($peso, $altura, $echo = true) {
    $imc = $peso / ($altura * $altura);
    if ($echo) {
        echo $imc;
    }
    return $imc;
}

$i = imc(62, 1.64, false);
echo $i;

imc(66, 1.69);

