<?php

class Persistencia_Conexao1 extends Persistencia_Driver_Mysql {
	private $_instance;
	public function getInstance() {
		if (null === self::$_instance) {
			self::$_instance = new self();
		}
		
		return self::$_instance;
	}
}