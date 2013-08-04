<?php

/**
 * Description of Abstract
 *
 * @author Alisson Chiquitto<chiquitto@chiquitto.com.br>
 */
class Model_Abstract {

    protected $erros = array();

    public function addErro($codigo, $msg) {
        $this->erros[$codigo] = $msg;
    }

    public function getErros() {
        return $this->erros;
    }
    
    public function temErros() {
        return (count($this->erros) > 0);
    }

}