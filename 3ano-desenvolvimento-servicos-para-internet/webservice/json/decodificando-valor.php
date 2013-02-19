<?php

$json = '{"nome":"Jose da Silva","email":"jose.silva@gmail.com","endereco":{"rua":"Av. Brasil","n":"1000","cidade":"Rio de Janeiro","uf":"RJ"}}';

$cliente = json_decode($json, true);

var_dump($cliente);

/**
array(3) {
  ["nome"]=>
  string(14) "Jose da Silva"
  ["email"]=>
  string(20) "jose.silva@gmail.com"
  ["endereco"]=>
  array(4) {
    ["rua"]=>
    string(10) "Av. Brasil"
    ["n"]=>
    string(4) "1000"
    ["cidade"]=>
    string(14) "Rio de Janeiro"
    ["uf"]=>
    string(2) "RJ"
  }
}
 */