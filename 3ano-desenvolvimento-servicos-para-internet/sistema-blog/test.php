<?php

require 'class/DO/Abstract.php';
require 'class/DO/Cliente.php';
require 'class/DAO/Abstract.php';
require 'class/DAO/Cliente.php';

$clienteDO = new DO_Cliente();
$clienteDO->cdcliente = 5;
$clienteDO->nome = 'Alisson Chiquitto';
$clienteDO->email = 'chiquitto@gmail.com';
$clienteDO->ano = 1950;

$clienteDAO = new DAO_Cliente();
//$clienteDAO->create($clienteDO);
//$clientes = $clienteDAO->request('ID = 5');
//$clienteDAO->update($clienteDO);
//$clienteDAO->delete('ID = 5');

$clientes = $clienteDAO->request();
echo $clientes[0]->nome;