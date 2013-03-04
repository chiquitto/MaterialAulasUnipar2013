<?php

mysql_connect('localhost', 'root', 'teste') or die(mysql_error());
mysql_select_db('xml') or die(mysql_error());

$sql = 'SELECT * FROM CLIENTE';
$query = mysql_query($sql) or die(mysql_error());

$clientes = new SimpleXmlElement('<clientes></clientes>');

while( $linha = mysql_fetch_assoc($query) ) {
	
	$cliente = $clientes->addChild('cliente');
	
	foreach( $linha as $chave => $valor ) {
		if ($chave != 'id') {
			$cliente->addChild($chave, $valor);
		}
	}
	
	/*$cliente->addChild('nome', $linha['nome']);
	$cliente->addChild('email', $linha['email']);
	$cliente->addChild('endereco', $linha['endereco']);
	$cliente->addChild('telefone', $linha['telefone']);*/
	
}

echo $clientes->asXML();






