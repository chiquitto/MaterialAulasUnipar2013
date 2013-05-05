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
	private $nome;

	public function __set($atributo, $valor) {
		echo $atributo;
		exit;
	}
}

$escola = new Escola();

$aluno1 = new Aluno();
$aluno1->setNome('Zezinho');
$escola->matricular($aluno1);

$aluno2 = new Aluno();
$aluno2->nome = 'Luizinho';
$escola->matricular($aluno2);

$escola->mostrarAlunos();