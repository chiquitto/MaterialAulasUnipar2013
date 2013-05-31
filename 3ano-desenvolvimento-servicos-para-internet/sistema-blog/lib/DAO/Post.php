<?php

class DAO_Post extends DAO_Abstract {
    protected $tabela = 'post';
    protected $pk = 'cdpost';
    public $erros = array();

    public function cadastrar($dados) {
        if ($dados['nome'] == '') {
            $this->erros[] = 'Informe o nome';
        }
        if ($dados['resumo'] == '') {
            $this->erros[] = 'Informe o resumo';
        }
        if ($dados['texto'] == '') {
            $this->erros[] = 'Informe o texto';
        }
        
        if (count($this->erros) > 0) {
            return FALSE;
        }
        
        $postDO = new DO_Post(array(
            'nome' => $dados['nome'],
            'resumo' => $dados['resumo'],
            'texto' => $dados['texto'],
            'ativo' => $dados['ativo'],
            'destaque' => $dados['destaque'],
        ));
        
        $id = $this->create($postDO);
        
        if ($id === false) {
            $this->erros[] = 'Erro para inserir o post';
        }
        
        return $id;
    }
}