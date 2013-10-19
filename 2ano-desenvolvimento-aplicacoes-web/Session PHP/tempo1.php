<?php
// tempo1.php
session_start();
$_SESSION['agora'] = time();

if (isset($_SESSION['anterior'])) {
	// mostrar segundos
	$diferenca = $_SESSION['agora'] - $_SESSION['anterior'];
	$_SESSION['anterior'] = $_SESSION['agora'];
	echo "Faz $diferenca segundos que você não acessa meu site";
}
else {
	$_SESSION['anterior'] = $_SESSION['agora'];
	echo 'Primeira vez que você acessou meu site';
}