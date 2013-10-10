<?php

$cipher = MCRYPT_GOST;
$mode = MCRYPT_MODE_ECB;

$iv_size = mcrypt_get_iv_size($cipher, $mode);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
$key = "CHAVE SECRETA";
$text = 'M*:hAô';
$crypttext = mcrypt_decrypt($cipher, $key, $text, $mode, $iv);

echo $crypttext;