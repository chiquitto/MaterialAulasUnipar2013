<?php

// contador2.php

session_start();

if ( !isset($_SESSION['cont']) ) {
	$_SESSION['cont'] = 0;
}

$_SESSION['cont']++;

echo $_SESSION['cont'];