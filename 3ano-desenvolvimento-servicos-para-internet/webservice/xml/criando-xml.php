<?php
$clientes = new SimpleXMLElement('<clientes></clientes>');

$cliente1 = $clientes->addChild('cliente');
$cliente1->addChild('nome', 'Geraldo Santos');
$cliente1->addChild('email', 'geraldo.santos@gmail.com');

$cliente2 = $clientes->addChild('cliente');
$cliente2->addChild('nome', 'Arquibancada do Corinthians');
$cliente2->addChild('email', 'arquibancada.corinthians@gmail.com');

header('Content-type:text/xml; charset=utf-8');
echo $clientes->asXML();