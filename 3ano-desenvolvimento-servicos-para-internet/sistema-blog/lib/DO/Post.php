<?php

class DO_Post extends DO_Abstract {
	public function setNome($valor) {
		$this->_dados['nome'] = strtoupper($valor);
	}
}