<?php

/**
 * Description of Post
 *
 * @author Alisson Chiquitto<chiquitto@chiquitto.com.br>
 */
class Model_Post extends Model_Abstract {

    public function cadastrar($dadosCadastrar) {
        if ($dadosCadastrar['nome'] == '') {
            $this->addErro(1001, 'Preencha o nome');
        }
        if ($dadosCadastrar['nome'] == '') {
            $this->addErro(1002, 'Preencha o resumo');
        }

        // Salvar no BD via DAO

        if ($this->temErros()) {
            return FALSE;
        }
        return TRUE;
    }

    public function pegarTodos() {
        // Pegar registros no BD via DAO
        // $registros = DAO::pegar()
        
        $registros = array(
            array(
                'id' => 1,
                'nome' => 'Brasil vence a Copa',
                'resumo' => 'Não pera, só que não',
            ),
            array(
                'id' => 2,
                'nome' => 'Manifestações continuam',
                'resumo' => 'Na tarde do último domingo, as manifestações começaram novamente',
            )
        );
        
        return $registros;
    }

}