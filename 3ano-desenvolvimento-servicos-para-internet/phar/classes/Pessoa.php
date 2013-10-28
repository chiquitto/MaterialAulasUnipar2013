<?php

class Pessoa {

	protected $nome;
	protected $mae;
	protected $pai;
	
	public function getNome() {
		return $this->nome;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function getMae() {
		return $this->mae;
	}
	
	public function setMae(Mae $mae) {
		$this->mae = $mae;
	}
		
	public function getPai() {
		return $this->pai;
	}
	
	public function setPai(Pai $pai) {
		$this->pai = $pai;
	}

}