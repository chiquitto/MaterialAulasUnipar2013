<?php

$cifra = 'cast-128';
$modo = MCRYPT_MODE_ECB;

$chave = 'unipar';
$string = '¿J>£&Á,Ÿ‘Ã]‘Íù·¹2lR>†';

$tamanhoIv = mcrypt_get_iv_size($cifra, $modo);
$iv = mcrypt_create_iv($tamanhoIv, MCRYPT_RAND);

$textoDescriptografado = mcrypt_decrypt($cifra, $chave, $string, $modo, $iv);

echo 'Texto descriptografado: ';
echo $textoDescriptografado;