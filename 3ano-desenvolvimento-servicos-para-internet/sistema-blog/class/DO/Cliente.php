<?php

class DO_Cliente extends DO_Abstract {
	public function setNome($valor) {
		$this->_dados['nome'] = strtoupper($valor);
	}
}