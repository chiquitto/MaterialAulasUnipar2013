<?php

class UsuarioController
extends Zend_Controller_Action {
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
                        ->setIdentity($dadosFiltrados['email'])
                        ->setCredential($dadosFiltrados['senha'])
                        ;
                
                $auth = Zend_Auth::getInstance();
                $autenticado = $auth->authenticate($dbAdapter);
                
                if ($autenticado->isValid()) {
                    $valoresArmazenados =
                            $dbAdapter->getResultRowObject(null, 'senha');
                    
                    $auth->getStorage()->write($valoresArmazenados);
                    
                    print_r($_SESSION);
                    exit;
                    
                    $this->_helper->Redirector->gotoUrlAndExit('/');
                    
                    exit;
                }
                else {
                    echo 'Email/Senha invalidos';
                    exit;
                }
                
            }
        }
        
        $this->view->formLogin = $form;
    }
}