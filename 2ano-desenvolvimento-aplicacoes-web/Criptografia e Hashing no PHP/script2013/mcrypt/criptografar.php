<?php

$cifra = 'cast-128';
$modo = MCRYPT_MODE_ECB;

$chave = 'unipar';
$string = 'Alisson Chiquitto';

$tamanhoIv = mcrypt_get_iv_size($cifra, $modo);
$iv = mcrypt_create_iv($tamanhoIv, MCRYPT_RAND);

$stringCriptografada = mcrypt_encrypt($cifra, $chave, $string, $modo, $iv);

echo 'Texto criptografado:';
echo $stringCriptografada;
echo '<br>';

echo 'Tamanho:';
echo strlen($stringCriptografada);
echo '<br>';

echo 'Hexadecimal:';
echo bin2hex($stringCriptografada);
echo '<br>';

echo $textoDescriptografado = mcrypt_decrypt($cifra, $chave, $stringCriptografada, $modo, $iv);


