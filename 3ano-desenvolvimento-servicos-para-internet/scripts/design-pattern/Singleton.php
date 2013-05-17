<?php

class Conexao {

    private static $instance;

    private function __construct() {
        echo 'Criado a conexão';
    }

    public function __clone() {
        throw new Exception('Você não pode duplicar esta instancia');
    }

    public static function getInstance() {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}

try {
    $con1 = Conexao::getInstance();
    $con2 = clone $con1;
} catch (Exception $e) {
    echo $e;
}