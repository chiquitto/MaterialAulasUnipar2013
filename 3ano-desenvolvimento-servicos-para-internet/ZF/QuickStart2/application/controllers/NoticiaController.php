<?php

class NoticiaController extends Zend_Controller_Action {


    public function indexAction() {
        // action body
    }
	
	public function cadastrarAction() {
		$formCadastrar = new Application_Form_Cadastrar();
		
		if ($this->getRequest()->isPost()) {
			$dados = $this->getRequest()->getParams();
			
			if ( $formCadastrar->isValid($dados) ) {
				$dadosFiltrados = $formCadastrar->getValues();
				
				print_r($dadosFiltrados);
				exit;
			}
		}
		
		$this->view->form = $formCadastrar;
	}
}