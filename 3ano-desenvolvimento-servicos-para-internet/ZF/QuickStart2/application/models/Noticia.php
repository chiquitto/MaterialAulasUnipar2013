<?php

class Application_Model_Noticia {

	/**
	Tenta cadastrar $dados no BD
	Se cadastrou retorna a PK
	Caso contrario retorna FALSE
	*/
	public function cadastrar( $dados ) {
		$insert = array();
		$insert['nome'] = strtoupper($dados['nome']);
		$insert['texto'] = $dados['texto'];
		$insert['datacadastro'] = $dados['data'];
		$insert['cdcategoria'] = 1;
		
		$tabela = new Application_Model_Table_Noticia();
		
		try {
			$cdnoticia = $tabela->insert($insert);
		}
		catch(Exception $e) {
			echo $e;
			exit;
			return false;
		}
		return $cdnoticia;
	}
}