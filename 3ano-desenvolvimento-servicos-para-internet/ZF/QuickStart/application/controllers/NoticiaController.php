<?php

class NoticiaController extends Zend_Controller_Action {
	
	public function init() {
        $auth = Zend_Auth::getInstance();
		if (!$auth->hasIdentity()) {
			$this->_helper->Redirector->gotoSimpleAndExit('index', 'login');
		}
		
		// Identidade existe, pegue ela
		$identity = $auth->getIdentity();
    }
	
	public function apagarAction() {
		$cdnoticia = (int) $this->_getParam('id');
		
		$tabela = new Application_Model_Table_Noticia();
		$tabela->delete("cdnoticia = $cdnoticia");
		
		$this->_helper->Redirector->gotoSimpleAndExit('index', 'noticia');
	}
	
	public function indexAction() {
		$tabela = new Application_Model_Table_Noticia();
		$pesquisa = $tabela->fetchAll();
		
		$this->view->noticias = $pesquisa;
	}
	
	// http://localhost/QuickStart/public/noticia/cadastrar
	public function cadastrarAction() {
		$form = new Application_Form_Noticia_Cadastrar();
		
		if( $this->getRequest()->isPost() ) {
			
			if ( $form->isValid( $this->_getAllParams() ) ) {
			
				// valores que estao no form
				$valores = $form->getValues();
				
				$model = new Application_Model_Noticia();
				$cdnoticia = $model->cadastrar(array(
					'cdcategoria' => $valores['cdcategoria'],
					'nome' => $valores['nome'],
					'texto' => $valores['texto']
				));
				
				if( $cdnoticia !== false ) {
					header('location:/QuickStart/public/noticia');
					exit;
				}
				else {
					echo 'Não foi possível salvar a noticia';
					exit;
				}
			}
		}
		
		$this->view->form = $form;
	}
	
	/**
	/QuickStart/public/noticia/editar/id/1
	*/
	public function editarAction() {
		$cdnoticia = (int) $this->_getParam('id');
		
		$tabela = new Application_Model_Table_Noticia();
		$noticia = $tabela->fetchRow('cdnoticia = ' . $cdnoticia);
		if($noticia === null) {
			echo 'A noticia não existe';
			exit;
		}
		
		$form = new Application_Form_Noticia_Editar();
		
		$form->populate(array(
			'cdcategoria' => $noticia->cdcategoria,
			'datacadastro' => $noticia->datacadastro,
			'nome' => $noticia->nome,
			'texto' => $noticia->texto,
			'cdnoticia' => $cdnoticia
		));
		
		
		$this->view->formEditar = $form;
	}
	
	
	
	
	
	
	
	
	
	
	
}