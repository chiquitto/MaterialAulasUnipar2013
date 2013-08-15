<?php

function cpf($numero) {
	return ($numero == '111');
}

class ValidadorController extends Zend_Controller_Action {
	
	/**
	localhost/validador/alnum
	*/
	public function alnumAction() {
		$validador = new Zend_Validate_Alnum();
		$string = '12.60';
		
		$resultado = $validador->isValid($string);
		
		if ($resultado) {
			echo 'Passou pela validação';
		}
		else {
			print_r($validador->getMessages());
		}
		
		exit;
	}

	/**
	localhost/validador/lessthan
	*/
	public function lessthanAction() {
		$validador = new Zend_Validate_LessThan(array('max' => 20));
		$string = 10;
		
		$resultado = $validador->isValid($string);
		
		if ($resultado) {
			echo 'Passou pela validação';
		}
		else {
			print_r($validador->getMessages());
		}
		
		exit;
	}
	
	/**
	localhost/validador/email
	*/
	public function emailAction() {
		$validador = new Zend_Validate_EmailAddress();
		$string = 'chiquitto@unipar.br';
		
		$resultado = $validador->isValid($string);
		
		if ($resultado) {
			echo 'Passou pela validação';
		}
		else {
			print_r($validador->getMessages());
		}
		
		exit;
	}
	
	/**
	localhost/validador/callback
	*/
	public function callbackAction() {
		$validador = new Zend_Validate_Callback('cpf');
		$string = '111';
		
		$resultado = $validador->isValid($string);
		
		if ($resultado) {
			echo 'Passou pela validação';
		}
		else {
			print_r($validador->getMessages());
		}
		
		exit;
	}
	
	/**
	localhost/validador/cpf
	*/
	public function cpfAction() {
		$validador = new Zend_Validate_Cpf();
		$string = '111';
		
		$resultado = $validador->isValid($string);
		
		if ($resultado) {
			echo 'Passou pela validação';
		}
		else {
			print_r($validador->getMessages());
		}
		
		exit;
	}
}