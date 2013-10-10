<?php

class Application_Form_Usuario_Editar
extends Zend_Form {
    
    public function __construct($options = null) {
        parent::__construct($options);
        
        $filtroMaiusculo = new Zend_Filter_StringToUpper();
        
        $elementoCdUsuario = new Zend_Form_Element_Hidden('cdusuario');
        $this->addElement($elementoCdUsuario);
        
        $elementoNome = new Zend_Form_Element_Text('nome', array(
            'label' => 'Nome do usuário',
            'required' => true,
        ));
        $this->addElement($elementoNome);
        $elementoNome->addFilter($filtroMaiusculo);
        
        $elementoEmail = new Zend_Form_Element_Text('email', array(
            'label' => 'Email do usuário',
            'required' => true,
        ));
        $this->addElement($elementoEmail);
        
        $elementoOk = new Zend_Form_Element_Submit('enviar', array(
            'label' => 'Salvar'
        ));
        $this->addElement($elementoOk);
    }
    
}