<?php

class Application_Form_Usuario_Cadastrar extends Zend_Form {
	public function __construct($options = null) {
		parent::__construct($options);
		
		$naoVazio = new Zend_Validate_NotEmpty();
		$emailValidate = new Zend_Validate_EmailAddress();
		$trimFilter = new Zend_Filter_StringTrim();
		$upperFilter = new Zend_Filter_StringToUpper();
		$htmlFilter = new Zend_Filter_StripTags();
		$nullFilter = new Zend_Filter_Null();
		
		$tabelaUsuario = new Application_Model_Table_Usuario();
		
		// nome
		$nomeElemento = new Zend_Form_Element_Text('nome', array(
			'label' => 'Nome do usuario',
			'required' => true
		));
		$this->addElement($nomeElemento);
		$nomeElemento
			->addValidator($naoVazio)
			;
		$nomeElemento
			->addFilter($trimFilter)
			->addFilter($upperFilter);
		
		// email
		$emailElemento = new Zend_Form_Element_Text('email', array(
			'label' => 'Email',
			'required' => true
		));
		$this->addElement($emailElemento);
		$emailElemento
			->addValidator($naoVazio)
			->addValidator($emailValidate)
			;
		$emailElemento
			->addFilter($trimFilter)
			->addFilter($upperFilter);
			
		// senha
		$senhaElemento = new Zend_Form_Element_Password('senha', array(
			'label' => 'Senha',
			'required' => true
		));
		$this->addElement($senhaElemento);
		$senhaElemento
			->addValidator($naoVazio)
			;
		
		$submitElemento = new Zend_Form_Element_Submit('submit', array(
			'label' => 'Enviar'
		));
		$this->addElement($submitElemento);
	}
}
