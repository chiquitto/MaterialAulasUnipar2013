<?php

class IndexController extends Zend_Controller_Action {


    public function indexAction() {
        // action body
    }
	
	/**
	localhost/index/validador
	*/
	public function validadorAction() {
		$validador = new Zend_Validate_Digits();
		$string = 'abc';
		
		$resultado = $validador->isValid($string);
		
		if ($resultado) {
			echo 'OK';
		}
		else {
			$erros = $validador->getMessages();
			
			print_r($erros);
		}
	
		exit;
	}


}