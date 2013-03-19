<?php

/**
Referencia:
http://php.net/manual/pt_BR/features.file-upload.post-method.php
*/

//print_r($_FILES);

// Verificar se o arquivo existe dentro de $_FILES

if( ! isset( $_FILES['arquivo'] ) ) {
	echo 'Envie um arquivo';
	exit;
}

// Verificar se houve falhas no upload

if( $_FILES['arquivo']['error'] != '0' ) {
	echo 'Erro ao enviar o arquivo';
	exit;
}

// Verificar o tamanho do arquivo

if( $_FILES['arquivo']['size'] > (1024*1024) ) {
	echo 'O tamanho máximo do arquivo deve ser 1mb';
	exit;
}

// Salvar o arquivo

copy(
	$_FILES['arquivo']['tmp_name'],
	'upload/' . $_FILES['arquivo']['name']
);
//move_uploaded_file

// Mostrar mensagem para o usuário






