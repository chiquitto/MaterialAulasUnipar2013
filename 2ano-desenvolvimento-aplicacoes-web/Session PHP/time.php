<?php

session_start();

if ( !isset($_SESSION['log']) ) {
	$_SESSION['log'] = array();
}

$_SESSION['log'][] = time();

print_r($_SESSION['log']);