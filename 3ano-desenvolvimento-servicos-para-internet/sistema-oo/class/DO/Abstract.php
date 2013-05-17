<?php

abstract class DO_Abstract {
	protected $_data = array();
	
	public function __construct($dados = array()) {
		$this->popular($dados);
	}
	
	public function __call($metodo, $parametros) {
		$metodo = strtolower($metodo);
		$parte1 = substr($metodo,0,3);
		
		if (($parte1 == 'get') or ($parte1 == 'set')) {
			$parte2 = substr($metodo,3);
			
			if ($parte1 == 'set') {
				$this->_data[$parte2] = $parametros[0];
			}
			else {
				return $this->_data[$parte2];
			}
		}
	}
	
	public function __get($atributo) {
		$metodo = 'get' . ucfirst($atributo);
		return $this->$metodo();
	}
	
	public function __set($atributo, $valor) {
		$metodo = 'set' . ucfirst($atributo);
		$this->$metodo($valor);
	}
	
	public function popular($dados) {
		foreach($dados as $atributo => $valor) {
			$this->$atributo = $valor;
		}
	}
}