<?php

require 'class/DO/Abstract.php';
require 'class/DO/Cliente.php';

require 'class/Persistencia/Driver/Interface.php';
require 'class/Persistencia/Driver/Mysql.php';
require 'class/Persistencia/Conexao1.php';

require 'class/DAO/Abstract.php';
require 'class/DAO/Cliente.php';

$clienteDO = new DO_Cliente();
$clienteDO->setNome('Alisson Chiquitto');
$clienteDO->setEmail('chiquitto@gmail.com');

$clienteDAO = new DAO_Cliente();