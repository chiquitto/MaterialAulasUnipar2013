<?php

class UsuarioController extends Zend_Controller_Action {
	
	public function init() {
        $auth = Zend_Auth::getInstance();
		if (!$auth->hasIdentity()) {
			$this->_helper->Redirector->gotoSimpleAndExit('index', 'login');
		}
		
		// Identidade existe, pegue ela
		$identity = $auth->getIdentity();
    }
	
	public function indexAction() {}
	
	// http://localhost/QuickStart/public/usuario/cadastrar
	public function cadastrarAction() {
		$form = new Application_Form_Usuario_Cadastrar();
		
		if( $this->getRequest()->isPost() ) {
			
			if ( $form->isValid( $this->_getAllParams() ) ) {
			
				// valores que estao no form
				$valores = $form->getValues();
				
				$model = new Application_Model_Usuario();
				$cdusuario = $model->cadastrar(array(
					'nome' => $valores['nome'],
					'email' => $valores['email'],
					'senha' => $valores['senha'],
				));
				
				if( $cdusuario !== false ) {
					$this->_helper->Redirector->gotoSimpleAndExit('index');
				}
				else {
					echo 'Não foi possível salvar o usuário';
					exit;
				}
			}
		}
		
		$this->view->form = $form;
	}
}