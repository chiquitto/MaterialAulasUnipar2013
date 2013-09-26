<?php

class Application_Form_Noticia_Editar
extends Application_Form_Noticia_Cadastrar {
	public function __construct() {
		parent::__construct();
		
		$idElemento = new Zend_Form_Element_Hidden('cdnoticia');
                $this->addElement($idElemento);
	}
}