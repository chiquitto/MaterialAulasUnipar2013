<?php

class Application_Form_Usuario_Login
extends Zend_Form {
    public function __construct($options = null) {
        parent::__construct($options);
        
        $emailElemento = new Zend_Form_Element_Text('email', array(
            'label' => 'Email',
            'required' => true,
        ));
        
        $filtroMinusculo = new Zend_Filter_StringToLower();
        $emailElemento->addFilter($filtroMinusculo);
        
        $senhaElemento = new Zend_Form_Element_Password('senha', array(
            'label' => 'Senha',
            'required' => true,
        ));
        
        $botaoElemento = new Zend_Form_Element_Submit('enviar', array(
            'label' => 'Entrar'
        ));
        
        $this->addElement($emailElemento);
        $this->addElement($senhaElemento);
        $this->addElement($botaoElemento);
    }
}