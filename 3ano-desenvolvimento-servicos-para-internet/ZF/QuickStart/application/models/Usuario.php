<?php

class Application_Model_Usuario {

	/**
	* Recebe as informações e tenta fazer 0 log-in do usuario
	* Retorna true em caso de sucesso
	*/
	public function login( $dados ) {
		$tabelaUsuario = new Application_Model_Table_Usuario();
		$authAdaptador = new Zend_Auth_Adapter_DbTable($tabelaUsuario->getDefaultAdapter());
		
		$authAdaptador
			->setTableName('usuario')
			->setIdentityColumn('email')
			->setCredentialColumn('senha')
			->setIdentity($dados['email'])
			->setCredential($dados['senha']);
		
		$auth = Zend_Auth::getInstance();
		$resultado = $auth->authenticate($authAdaptador);
		
		if ($resultado->isValid()) {
			$dadosAutenticados = $authAdaptador->getResultRowObject();
			$auth->getStorage()->write($dadosAutenticados);
			
			return true;
		}
		else {
			return false;
		}
	}
	
	/**
	* Recebe as informações e salva no BD
	* Retorna a chave primaria ou false
	*/
	public function cadastrar( $dados ) {
		$inserir = array();
		$inserir['nome'] = $dados['nome'];
		$inserir['email'] = $dados['email'];
		$inserir['senha'] = $dados['senha'];
		
		$tabelaUsuario = new Application_Model_Table_Usuario();
		/**
		* Envia as informações para inserir no BD
		* e retorna o autoincrement gerado
		*/
		try {
			$cdusuario = $tabelaUsuario->insert($inserir);
		}
		catch(Exception $e) {
			return false;
		}
		
		return $cdusuario;
	}
}