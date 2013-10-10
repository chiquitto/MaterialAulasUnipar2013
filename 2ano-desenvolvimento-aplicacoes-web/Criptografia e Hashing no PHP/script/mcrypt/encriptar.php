<?php

$cipher = MCRYPT_GOST;
$mode = MCRYPT_MODE_ECB;

$iv_size = mcrypt_get_iv_size($cipher, $mode);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
$key = "CHAVE SECRETA";
$text = 'UNIPAR';
$crypttext = mcrypt_encrypt($cipher, $key, $text, $mode, $iv);

echo strlen($crypttext) . "<br>";
echo $crypttext;