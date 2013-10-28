<?php

$srcRoot = "./classes";
$buildRoot = "./";

/*
$phar = new Phar(
	$buildRoot . "/classes.phar",
	FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::KEY_AS_FILENAME,
	"classes.phar"
);
$phar["index.php"] = file_get_contents($srcRoot . "/index.php");
$phar["common.php"] = file_get_contents($srcRoot . "/common.php");
$phar->setStub($phar->createDefaultStub("index.php"));
*/

$phar = new Phar(
	$buildRoot . "/classes.phar",
	0,
	"classes.phar"
);
$phar->buildFromDirectory($srcRoot);
$phar->setStub($phar->createDefaultStub("sistema.php"));

//copy($srcRoot . "/config.ini", $buildRoot . "/config.ini");






