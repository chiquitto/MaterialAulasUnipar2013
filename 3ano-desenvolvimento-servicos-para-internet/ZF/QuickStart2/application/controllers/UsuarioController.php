<?php

class UsuarioController extends Zend_Controller_Action {

    private function testarLogin() {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_helper->Redirector->gotoSimpleAndExit('login', 'usuario');
        }
    }

    public function cadastrarAction() {
        $this->testarLogin();

        $formCadastrar = new Application_Form_Usuario_Cadastrar();

        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();

            if ($formCadastrar->isValid($dados)) {
                $dadosFiltrados = $formCadastrar->getValues();

                $usuarioModel = new Application_Model_Usuario();
                $cdusuario = $usuarioModel->cadastrar($dadosFiltrados);

                if ($cdusuario === FALSE) {
                    $this->view->msg = 'Não foi possível inserir o registro no BD';
                } else {
                    $this->view->msg = "Inseriu o registro com o ID = $cdusuario";
                }
            }
        }

        $this->view->form = $formCadastrar;
    }

    public function editarAction() {
        $cdusuario = (int) $this
                        ->getRequest()
                        ->getParam('cdusuario', 0);

        $tabela = new Application_Model_Table_Usuario();

        $registros = $tabela
                ->fetchAll("cdusuario = $cdusuario");

        if ($registros->count() != 1) {
            echo 'O registro não existe';
            exit;
        }

        $registro = $registros->current();

        $form = new Application_Form_Usuario_Editar();
        
        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();
            
            if ($form->isValid($dados)) {
                $dadosFiltrados = $form->getValues();
                
                $model  = new Application_Model_Usuario();
                $ok = $model->editar($dadosFiltrados);
                
                if ($ok === false) {
                    $this->view->msg = 'Não foi possível atualizar o registro no BD';
                } else {
                    $this->view->msg = 'Atualizou o registro';
                }
            }
        }
        else {
            $valoresForm = $registro->toArray();
            
            $form->populate($valoresForm);
        }

        $this->view->formEditar = $form;
    }

    public function trocarsenhaAction() {
        $cdusuario = (int) $this
                        ->getRequest()
                        ->getParam('cdusuario', 0);

        $tabela = new Application_Model_Table_Usuario();

        $registros = $tabela
                ->fetchAll("cdusuario = $cdusuario");

        if ($registros->count() != 1) {
            echo 'O registro não existe';
            exit;
        }

        $registro = $registros->current();

        $form = new Application_Form_Usuario_Trocarsenha();
        
        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();
            
            if ($form->isValid($dados)) {
                $dadosFiltrados = $form->getValues();
                
                $model  = new Application_Model_Usuario();
                $ok = $model->trocarsenha($dadosFiltrados);
                
                if ($ok === false) {
                    $this->view->msg = 'Não foi possível atualizar o registro no BD';
                } else {
                    $this->view->msg = 'Atualizou o registro';
                }
            }
        }
        else {
            $valoresForm = $registro->toArray();
            
            $form->populate($valoresForm);
        }

        $this->view->formSenha = $form;
    }

    public function loginAction() {
        $form = new Application_Form_Usuario_Login();

        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();

            if ($form->isValid($dados)) {

                $dadosFiltrados = $form->getValues();

                //$conexao = Zend_Db_Table::getDefaultAdapter();

                $dbAdapter = new Zend_Auth_Adapter_DbTable();
                $dbAdapter
                        ->setTableName('usuario')
                        ->setIdentityColumn('email')
                        ->setCredentialColumn('senha')
                        ->setCredentialTreatment('md5(?)')
                        ->setIdentity($dadosFiltrados['email'])
                        ->setCredential($dadosFiltrados['senha'])
                ;

                $auth = Zend_Auth::getInstance();
                $autenticado = $auth->authenticate($dbAdapter);

                if ($autenticado->isValid()) {
                    $valoresArmazenados =
                            $dbAdapter->getResultRowObject(null, 'senha');

                    $auth->getStorage()->write($valoresArmazenados);

                    $this->_helper->Redirector->gotoUrlAndExit('/');

                    exit;
                } else {
                    echo 'Email/Senha invalidos';
                    exit;
                }
            }
        }

        $this->view->formLogin = $form;
    }

}
