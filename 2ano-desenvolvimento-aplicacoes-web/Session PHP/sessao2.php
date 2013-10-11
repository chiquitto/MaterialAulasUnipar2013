<?php

// sessao2.php

session_start();

echo $_SESSION['nome'] . '<br>';

if ( isset($_SESSION['idade']) ) {
	echo $_SESSION['idade'] . '<br>';
}
else {
	echo 'Idade nao existe<br>';
}