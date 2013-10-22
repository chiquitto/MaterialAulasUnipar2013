<?php

class Aluno extends Pessoa {
	protected $ra;
	
	public function getRa() {
		return $this->ra;
	}
	
	public function setRa($ra) {
		$this->ra = $ra;
	}

}