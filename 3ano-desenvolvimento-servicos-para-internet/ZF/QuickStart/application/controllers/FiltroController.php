<?php

class FiltroController extends Zend_Controller_Action {

    /**
     * localhost/filtro/digitos
     */
    public function digitosAction() {
        $filtro = new Zend_Filter_Digits();
        $string = '999.999.999-99';
        
        $stringFiltrada = $filtro->filter($string);
        
        echo $stringFiltrada;
        
        exit;
    }
    
    public function cepAction() {
        $filtro = new Zend_Filter_Cep();
        $string = 'a7c56554d5656-+)(';
        
        $stringFiltrada = $filtro->filter($string);
        
        echo $stringFiltrada;
        
        exit;
    }

}



