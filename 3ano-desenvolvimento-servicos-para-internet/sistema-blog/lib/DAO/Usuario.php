<?php

class DAO_Usuario extends DAO_Abstract {

    protected $tabela = 'usuario';
    protected $pk = 'id';
    public $erros = array();

    /**
     * Retornar o ID ou FALSE
     */
    public function cadastrar($dados) {
        if ($dados['nome'] == '') {
            $this->erros[] = 'Preencha o nome';
        }
        if ($dados['email'] == '') {
            $this->erros[] = 'Preencha o email';
        }
        if ($dados['login'] == '') {
            $this->erros[] = 'Preencha o login';
        }
        if ($dados['senha'] == '') {
            $this->erros[] = 'Preencha a senha';
        }
        
        if (count($this->erros) > 0) {
            return false;
        }
        
        $doUsuario = new DO_Usuario();
        $doUsuario->nome = $dados['nome'];
        $doUsuario->email = $dados['email'];
        $doUsuario->login = $dados['login'];
        $doUsuario->senha = md5($dados['senha']);
        
        $where = "nome = '" . $doUsuario->nome . "'";
        $r = $this->request($where);
        
        if (count($r) > 0) {
            $this->erros[] = 'Este nome ja existe.';
            return false;
        }
        
        $id = $this->create($doUsuario);
        
        return $id;
    }

}