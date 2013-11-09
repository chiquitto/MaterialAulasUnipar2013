<?php

class Application_Model_Categoria {

	/**
	* Recebe as informações e salva no BD
	* Retorna a chave primaria ou false
	*/
	public function cadastrar( $dados ) {
		$inserir = array();
		$inserir['categoria'] = $dados['categoria'];
		
		$tabelaCategoria = new Application_Model_Table_Categoria();
		
		/**
		* Envia as informações para inserir no BD
		* e retorna o autoincrement gerado
		*/
		try {
			$cdcategoria = $tabelaCategoria->insert($inserir);
		}
		catch(Exception $e) {
			return false;
		}
		
		return $cdcategoria;
	}
	
}