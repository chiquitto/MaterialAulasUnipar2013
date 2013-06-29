<?php

class DO_Usuario extends DO_Abstract {
    public function setNome($nome) {
        $this->_dados['nome'] = strtoupper($nome);
    }
    
    public function setEmail($email) {
        $this->_dados['email'] = strtolower($email);
    }
    
    public function setLogin($login) {
        $this->_dados['login'] = strtolower($login);
    }
}