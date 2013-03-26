<?php

if ( isset($_GET['n1']) ) {
	echo $_GET['n1'];
}

if ( isset($_GET['n2']) ) {
	echo $_GET['n2'];
}

if ( (isset($_GET['n1'])) and (isset($_GET['n2'])) ) {
	echo $_GET['n1'] + $_GET['n2'];
}

/**
http://localhost/isset.php?n1=2&n2=3
http://localhost/isset.php?n2=3&n1=2
*/