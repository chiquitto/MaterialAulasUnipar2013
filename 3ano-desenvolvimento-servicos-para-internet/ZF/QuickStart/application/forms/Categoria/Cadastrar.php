<?php

class Application_Form_Categoria_Cadastrar extends Zend_Form {
	public function __construct($options = null) {
		parent::__construct($options);
		
		$naoVazio = new Zend_Validate_NotEmpty();
		$trimFilter = new Zend_Filter_StringTrim();
		$upperFilter = new Zend_Filter_StringToUpper();
		
		$categoriaElemento = new Zend_Form_Element_Text('categoria', array(
			'label' => 'Nome da categoria',
			'required' => true
		));
		$this->addElement($categoriaElemento);
		$categoriaElemento
			->addValidator($naoVazio);
			
		$categoriaElemento
			->addFilter($trimFilter)
			->addFilter($upperFilter);
		
		$submitElemento = new Zend_Form_Element_Submit('submit', array(
			'label' => 'Enviar'
		));
		$this->addElement($submitElemento);
	}
}
