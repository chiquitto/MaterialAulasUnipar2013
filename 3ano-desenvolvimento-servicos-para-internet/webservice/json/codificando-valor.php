<?php

$cliente = array(
    'nome' => 'Jose da Silva',
    'email' => 'jose.silva@gmail.com',
    'endereco' => array(
        'rua' => 'Av. Brasil',
        'n' => '1000',
        'cidade' => 'Rio de Janeiro',
        'uf' => 'RJ'
    )
);

$json = json_encode($cliente);

echo $json;

/**
 {"nome":"Jose da Silva","email":"jose.silva@gmail.com","endereco":{"rua":"Av. Brasil","n":"1000","cidade":"Rio de Janeiro","uf":"RJ"}}
 */