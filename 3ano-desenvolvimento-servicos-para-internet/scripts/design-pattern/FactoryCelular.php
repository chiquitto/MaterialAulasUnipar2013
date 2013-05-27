<?php

interface InterfaceCelular {
    public function escolherCaracteristicas();
    public function montarCelular();
    public function juntarAcessorios();
    public function encaixotar();
}

abstract class Celular implements InterfaceCelular {
    /**
     * @todo
     */
}

class CelularFactory {
    public static function factory($modelo) {
        
        /**
         * @todo
         */
        
        $celular->escolherCaracteristicas();
        $celular->montarCelular();
        $celular->juntarAcessorios();
        $celular->encaixotar();
    }
}

$celular = CelularFactory::factory('iphone4');
$celular = CelularFactory::factory('s3');
$celular = CelularFactory::factory('mb526');