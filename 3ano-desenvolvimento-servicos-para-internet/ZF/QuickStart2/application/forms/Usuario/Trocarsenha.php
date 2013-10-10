<?php

class Application_Form_Usuario_Trocarsenha
extends Zend_Form {
    public function __construct($options = null) {
        parent::__construct($options);
        
        $elementoCdUsuario = new Zend_Form_Element_Hidden('cdusuario');
        $this->addElement($elementoCdUsuario);
        
        $elementoSenha = new Zend_Form_Element_Password('senha', array(
            'label' => 'Senha do usuário',
            'required' => true,
        ));
        $this->addElement($elementoSenha);
        
        $elementoBotao = new Zend_Form_Element_Submit('botao', array(
            'label' => 'Salvar senha',
        ));
        $this->addElement($elementoBotao);
    }
}