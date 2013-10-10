<?php

class Application_Model_Usuario {

    /**
      Tenta cadastrar $dados no BD
      Se cadastrou retorna a PK
      Caso contrario retorna FALSE
     */
    public function cadastrar($dados) {
        $insert = array();
        $insert['nome'] = strtoupper($dados['nome']);
        $insert['email'] = strtolower($dados['email']);
        $insert['senha'] = md5($dados['senha']);

        $tabela = new Application_Model_Table_Usuario();

        try {
            $cdusuario = $tabela->insert($insert);
        } catch (Exception $e) {
            return FALSE;
        }

        return $cdusuario;
    }

    public function editar($dados) {
        $editar = array();
        $editar['nome'] = $dados['nome'];
        $editar['email'] = $dados['email'];

        $where = 'cdusuario = ' . $dados['cdusuario'];

        try {
            $tabela = new Application_Model_Table_Usuario();
            $tabela->update($editar, $where);
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }

    public function trocarsenha($dados) {
        $editar = array();
        $editar['senha'] = md5($dados['senha']);
        
        $where = 'cdusuario = ' . $dados['cdusuario'];
        
        try {
            $tabela = new Application_Model_Table_Usuario();
            $tabela->update($editar, $where);
            return true;
        } catch (Exception $exc) {
            return false;
        }
    }
    
}
