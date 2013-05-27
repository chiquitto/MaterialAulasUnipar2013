<?php

class Configuracoes {

    private static $instance;
    private $_config;

    private function __construct() {
        /**
         * @todo Busca um registro no BD e armazena o valor no $this->_config
         */
    }

    public static function getInstance() {
       /**
        * @todo Implementação do metodo getInstance
        */
    }

    public function pegaValor($posicao) {
        /**
         * @todo Retorna o valor da $posicao em $this->_config
         */
    }

}

echo Configuracoes::getInstance()->pegaValor('nome');
echo Configuracoes::getInstance()->pegaValor('endereco');