<?php

class Application_Form_Noticia_Editar
extends Application_Form_Noticia_Cadastrar {

	public function __construct($options = null) {
		parent::__construct($options);
		
		$cdnoticiaElemento = new Zend_Form_Element_Hidden('cdnoticia');
		$this->addElement($cdnoticiaElemento);
		
		$datacadastroElemento = new Zend_Form_Element_Text('datacadastro', array(
			'label' => 'Data de cadastro',
			'readonly' => true,
			'order' => 1
		));
		$this->addElement($datacadastroElemento);
	}
}