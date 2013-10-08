<?php

class Application_Form_Usuario_Cadastrar
extends Zend_Form {
	public function __construct() {
		parent::__construct();
		
		$nomeElemento = new Zend_Form_Element_Text('nome', array(
			'label' => 'Nome do usuário',
			'required' => true
		));
		$this->addElement($nomeElemento);
		
		$textoElemento = new Zend_Form_Element_Text('email', array(
			'label' => 'Email do usuário',
			'required' => true
		));
		$this->addElement($textoElemento);
		
		$dataElemento = new Zend_Form_Element_Password('data', array(
			'label' => 'Senha',
			'required' => true
		));
		$this->addElement($dataElemento);
		
		$submitElemento = new Zend_Form_Element_Submit('submit', array(
			'label' => 'Salvar'
		));
		$this->addElement($submitElemento);
	}
}
