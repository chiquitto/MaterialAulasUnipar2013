<?php

/**
 * /private/application/forms/Cadastrar.php
 */
class Application_Form_Cadastrar extends Zend_Form {

    public function __construct($options = null) {
        parent::__construct($options);
        
        $emailValidador = new Zend_Validate_EmailAddress();
        
        $alphaFiltro = new Zend_Filter_Alpha();
        $alphaFiltro->setAllowWhiteSpace(TRUE);

        $nomeElemento = new Zend_Form_Element_Text('nome', array(
            'label' => 'Nome'
        ));
        $this->addElement($nomeElemento);
        $nomeElemento->addFilter($alphaFiltro);

        $emailElemento = new Zend_Form_Element_Text('email', array(
            'label' => 'Email',
            'required' => TRUE,
        ));
        $this->addElement($emailElemento);
        $emailElemento->addValidator($emailValidador);
        
        $submitElemento = new Zend_Form_Element_Submit('submit', array(
            'label' => 'Enviar informações'
        ));
        $this->addElement($submitElemento);
    }

}