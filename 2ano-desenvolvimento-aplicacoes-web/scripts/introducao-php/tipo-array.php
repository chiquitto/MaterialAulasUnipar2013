<?php

// Array simples
$frutas = array('Banana', 'Laranja', 'Jaca');

echo $frutas[0]; // Banana
echo $frutas[1]; // Laranja
echo $frutas[2]; // Jaca

// Array simples
$frutas = array();
$frutas[0] = 'Banana';
$frutas[1] = 'Laranja';
$frutas[2] = 'Jaca';

echo $frutas[0]; // Banana
echo $frutas[1]; // Laranja
echo $frutas[2]; // Jaca

// Array simples
$frutas = array();
$frutas[] = 'Banana';
$frutas[] = 'Laranja';
$frutas[] = 'Jaca';

echo $frutas[0]; // Banana
echo $frutas[1]; // Laranja
echo $frutas[2]; // Jaca

// Vetor
$time = array();
$time['nome'] = 'Corinthians';
$time['titulos'] = 0;
$time['cidade'] = 'São Paulo';

echo $time['nome']; // Corinthians
echo $time['cidade']; //São Paulo

// Vetor
$time = array(
    'nome' => 'Corinthians',
    'titulos' => 0,
    'cidade' => 'São Paulo',
);

echo $time['nome']; // Corinthians
echo $time['cidade']; //São Paulo


// Arvore
$cidadeSP = array('São Paulo', 'Campinas', 'Jundiai');
$cidadePR = array('Cianorte', 'Curitiba', 'Londrina', 'Xambrê');

$cidades = array(
    'PR' => $cidadePR,
    'SP' => $cidadeSP
);

echo $cidades['PR'][0]; // Cianorte
echo $cidades['PR'][2]; // Londrina
echo $cidades['SP'][1]; // Campinas


