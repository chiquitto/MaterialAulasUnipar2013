<?php

/**
 * Description of View
 *
 * @author Alisson Chiquitto<chiquitto@chiquitto.com.br>
 */
class View {
    private $parametros;
    
    public function __construct() {
        $this->parametros = array(
            'erro' => 0,
        );
    }
    
    public function mostrar($view) {
        $dados = $this->parametros;
        include DIRETORIO_VIEW . '/' . $view . '.php';
    }
    
    public function setParametro($parametro, $valor) {
        $this->parametros[$parametro] = $valor;
    }
}