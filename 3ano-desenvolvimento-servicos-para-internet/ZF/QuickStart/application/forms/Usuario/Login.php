<?php

class Application_Form_Usuario_Login extends Zend_Form {
	public function __construct($options = null) {
		parent::__construct($options);
		
		$emailElemento = new Zend_Form_Element_Text('email', array(
			'label' => 'Email',
		));
		
		$senhaElemento = new Zend_Form_Element_Password('senha', array(
			'label' => 'Senha',
		));
		
		$botaoElemento = new Zend_Form_Element_Submit('botao');
		
		$this->addElement($emailElemento);
		$this->addElement($senhaElemento);
		$this->addElement($botaoElemento);
	}
}
