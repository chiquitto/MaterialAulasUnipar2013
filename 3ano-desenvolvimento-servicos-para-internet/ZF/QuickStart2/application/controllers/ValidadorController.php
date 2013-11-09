<?php

class ValidadorController extends Zend_Controller_Action {
	public function init() {}
	
	// http://localhost/QuickStart/public/validador
	public function indexAction() {
		$validador = new Zend_Validate_Ip();
		$valor = 'chiquitto@@unipar.br';
		
		if($validador->isValid($valor)) {
			echo 'O valor é valido';
		}
		else {
			$erros = $validador->getMessages();
			print_r($erros);
		}
		
		exit;
	}
}