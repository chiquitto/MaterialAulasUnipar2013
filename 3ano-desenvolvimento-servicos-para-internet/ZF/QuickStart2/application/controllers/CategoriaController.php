<?php

class CategoriaController extends Zend_Controller_Action {
	
	public function init() {
        $auth = Zend_Auth::getInstance();
		if (!$auth->hasIdentity()) {
			$this->_helper->Redirector->gotoSimpleAndExit('index', 'login');
		}
		
		// Identidade existe, pegue ela
		$identity = $auth->getIdentity();
    }
	
	public function indexAction() {}
	
	// http://localhost/QuickStart/public/categoria/cadastrar
	public function cadastrarAction() {
		$form = new Application_Form_Categoria_Cadastrar();
		
		if( $this->getRequest()->isPost() ) {
			
			if ( $form->isValid( $this->_getAllParams() ) ) {
			
				// valores que estao no form
				$valores = $form->getValues();
				
				$model = new Application_Model_Categoria();
				$cdcategoria = $model->cadastrar(array(
					'categoria' => $valores['categoria'],
				));
				
				if( $cdcategoria !== false ) {
					$this->_helper->Redirector->gotoSimpleAndExit('index');
				}
				else {
					echo 'Não foi possível salvar a categoria';
					exit;
				}
			}
		}
		
		$this->view->form = $form;
	}
}