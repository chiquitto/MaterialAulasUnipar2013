<?php

class NoticiaController extends Zend_Controller_Action {

	public function init() {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->Redirector->gotoSimpleAndExit('login', 'usuario');
        }
    }

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

            if ($formCadastrar->isValid($dados)) {
                $dadosFiltrados = $formCadastrar->getValues();

                $noticiaModel = new Application_Model_Noticia();
                $cdnoticia = $noticiaModel->cadastrar($dadosFiltrados);

                if ($cdnoticia === FALSE) {
                    $this->view->msg = 'Não foi possível inserir o registro no BD';
                } else {
                    $this->view->msg = "Inseriu o registro com o ID = $cdnoticia";
                }
            }
        }

        $this->view->form = $formCadastrar;
    }

    public function editarAction() {
        $cdnoticia = (int) $this->getRequest()->getParam('cdnoticia', 0);

        $tabela = new Application_Model_Table_Noticia();

        $registros = $tabela->fetchAll("cdnoticia = $cdnoticia");

        if ($registros->count() != 1) {
            echo 'Registro inexistente';
            exit;
        }

        $registro = $registros->current();

        $form = new Application_Form_Noticia_Editar();

        if ($this->getRequest()->isPost()) {
            $parametros = $this->getRequest()->getParams();
            if ($form->isValid($parametros)) {
                $parametrosFiltrados = $form->getValues();

                $noticiaModel = new Application_Model_Noticia();
                $ok = $noticiaModel->editar($parametrosFiltrados);

                if ($ok === false) {
                    $this->view->msg = 'Não foi possível atualizar o registro no BD';
                } else {
                    $this->view->msg = "Atualizou o registro";
                }
            }
        } else {
            $array = $registro->toArray();
            $array['data'] = $array['datacadastro'];
            $form->populate($array);
        }

        $this->view->formulario = $form;
    }

}

