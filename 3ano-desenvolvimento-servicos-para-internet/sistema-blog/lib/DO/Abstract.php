<?php

abstract class DO_Abstract {
	protected $_dados = array();
	
	public function __construct($dados = array()) {
		$this->popular($dados);
	}

	public function __call($metodo, $parametros) {
		$metodo = strtolower($metodo);
		
		$parte1 = substr($metodo, 0, 3);
		
		if (($parte1 == 'get') or ($parte1 == 'set')) {
			$parte2 = substr($metodo, 3);
			
			if ($parte1 == 'get') {
				return $this->_dados[$parte2];
			}
			else {
				$this->_dados[$parte2] = $parametros[0];
			}
		}
	}
	
	public function __set($atributo, $valor) {
		$atributo = ucfirst(strtolower($atributo));
		$metodo = 'set' . $atributo;
		$this->$metodo($valor);
	}
	
	public function __get($atributo) {
		$atributo = ucfirst(strtolower($atributo));
		$metodo = 'get' . $atributo;
		return $this->$metodo();
	}
        
        public function getTodos() {
            return $this->_dados;
        }


        public function popular($dados) {
            foreach($dados as $name => $value) {
                $this->$name = $value;
            }
	}
	
}