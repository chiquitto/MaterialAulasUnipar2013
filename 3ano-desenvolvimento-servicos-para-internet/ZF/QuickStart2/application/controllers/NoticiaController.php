<?php

class NoticiaController extends Zend_Controller_Action {


    public function indexAction() {
        $tabela = new Application_Model_Table_Noticia();
		
		$registros = $tabela
		->fetchAll()
		->toArray()
		;
		
		$this->view->lista = $registros;
    }
	
	public function cadastrarAction() {
		$formCadastrar = new Application_Form_Noticia_Cadastrar();
		
		if ($this->getRequest()->isPost()) {
			$dados = $this->getRequest()->getParams();
			
			if ( $formCadastrar->isValid($dados) ) {
				$dadosFiltrados = $formCadastrar->getValues();
				
				$noticiaModel = new Application_Model_Noticia();
				$cdnoticia = $noticiaModel->cadastrar($dadosFiltrados);
				
				if ($cdnoticia === FALSE) {
					$this->view->msg = 'Não foi possível inserir o registro no BD';
				}
				else {
					$this->view->msg = "Inseriu o registro com o ID = $cdnoticia";
				}
			}
		}
		
		$this->view->form = $formCadastrar;
	}
}




