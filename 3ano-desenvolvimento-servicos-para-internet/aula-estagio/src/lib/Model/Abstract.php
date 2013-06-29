<?php

/**
 * Description of Abstract
 *
 * @author Alisson Chiquitto<chiquitto@chiquitto.com.br>
 */
class Model_Abstract {
    
    const ERRO_BD = 1001;

    protected $_erros = array();
    
    protected function adicionarErro($cdErro, $dsErro) {
        $this->_erros[$cdErro] = $dsErro;
    }
    
    public function limpaErros() {
        $this->_erros = array();
    }
    
    public function pegarErros() {
        return $this->_erros;
    }
    
    public function temErros() {
        if(count($this->_erros) > 0) {
            return TRUE;
        }
        return FALSE;
    }
}