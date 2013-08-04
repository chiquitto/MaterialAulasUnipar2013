<?php

function salgar($texto) {
	return ('salgado' . $texto);
}

class FiltroController extends Zend_Controller_Action {
	public function init() {}
	
	// http://localhost/QuickStart/public/validador
	public function indexAction() {
		
	}
	// http://localhost/QuickStart/public/filtro/alnum
	public function alnumAction() {
		$filtro = new Zend_Filter_Alnum();
		$valorA = 'abc/123';
		
		$valorB = $filtro->filter($valorA);
		
		echo $valorB;
		
		exit;
	}
	
	public function encryptAction() {
		$filtro = new Zend_Filter_Encrypt(array('adapter' => 'mcrypt'));
		
		$valorA = 'abc/123';
		
		$valorB = $filtro->filter($valorA);
		
		echo $valorB;
		
		exit;
	}
	
	
	public function striptagsAction() {
		$filtro = new Zend_Filter_StripTags();
		
		$valorA = 'Meu texto com <strong>negrito</strong>';
		
		$valorB = $filtro->filter($valorA);
		
		echo $valorB;
		
		exit;
	}
	
	public function callbackAction() {
		$filtro = new Zend_Filter_Callback('salgar');
		
		$valorA = 'Meu texto invertido!';
		
		$valorB = $filtro->filter($valorA);
		
		echo $valorB;
		
		exit;
	}
	
	
	
}