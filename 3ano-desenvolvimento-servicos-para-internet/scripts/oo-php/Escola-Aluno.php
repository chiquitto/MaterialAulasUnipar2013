<?php

class Escola {
	public $alunos = array();

	public function matricular($aluno) {
		$this->alunos[] = $aluno;
	}

	public function mostrarAlunos() {
		// mostrar os nomes de todos os alunos
		foreach($this->alunos as $aluno) {
			echo $aluno->nome . '<br>';
		}
	}
}

class Aluno {
	public $nome;
}

$escola = new Escola();

$aluno1 = new Aluno();
$aluno1->nome = 'Zezinho';
$escola->matricular($aluno1);

$aluno2 = new Aluno();
$aluno2->nome = 'Luizinho';
$escola->matricular($aluno2);

$escola->mostrarAlunos();