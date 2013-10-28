<?php

class Escola {
	
	private $alunos = array();
	
	public function matricular(Aluno $aluno) {
		$this->alunos[] = $aluno;
	}
	
	/**
	* Retorna o objeto Aluno que tem o RA pesquisado
	* Se nao existe entao retorna NULL
	*
	* @return Aluno
	*/
	public function getAlunoPorRa($ra) {
		// Implementar o metodo
	}
	
	public function getAlunos() {
		return $this->alunos;
	}
	
	/**
	* Procura o Aluno por RA
	* 	. Se existe entao remove o Aluno deste objeto ($this), matricula em $escola e retorna TRUE
	*   . Se nao existe entao retorna FALSE
	* @return boolean
	*/
	public function transferirAluno($ra, Escola $escola) {
		
	}
	
}