<?php

class Application_Model_Noticia {

	/**
	* Recebe as informações e salva no BD
	* Retorna a chave primaria ou false
	*/
	public function cadastrar( $dados ) {
		$inserir = array();
		$inserir['nome'] = $dados['nome'];
		$inserir['texto'] = $dados['texto'];
		$inserir['datacadastro'] = date('Y-m-d');
		$inserir['cdcategoria'] = $dados['cdcategoria'];
		
		$tabelaNoticia = new Application_Model_Table_Noticia();
		/**
		* Envia as informações para inserir no BD
		* e retorna o autoincrement gerado
		*/
		try {
			$cdnoticia = $tabelaNoticia->insert($inserir);
		}
		catch(Exception $e) {
			return false;
		}
		
		return $cdnoticia;
	}
	
	/**
     * Atualiza as informacoes na tabela noticia.
     * Retorna TRUE se não houve falhas.
     * 
     * @param array $dados
     * @return boolean
     */
    public function editar($dados) {
        
        $editar = array();
        $editar['nome'] = $dados['nome'];
        $editar['texto'] = $dados['texto'];
        $editar['datacadastro'] = $dados['data'];
		$editar['cdcategoria'] = $dados['cdcategoria'];

        try {
            $tabela = new Application_Model_Table_Noticia();

            $where = 'cdnoticia = ' . $dados['cdnoticia'];
            $tabela->update($editar, $where);
            
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }
}