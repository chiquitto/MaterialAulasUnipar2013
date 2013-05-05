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
	private $dados = array();

	public function __set($atributo, $valor) {
		$this->dados[$atributo] = $valor;
	}

	public function __call($metodo, $parametros) {
		// converte para minusculo
		$metodo = strtolower($metodo);

		if ($metodo == 'setaridadeepai' ) {
			$this->setarIdadeEPai($parametros[0], $parametros[1]);
		}
	}

	public function __get($atributo) {
		return $this->dados[$atributo];
	}

	public function __clone() {
		$this->nome = $this->nome . ' Clonado';
	}

	public function __toString() {
		return $this->nome;
	}

	public function setarIdadeEPai($idade, $pai) {
		$this->idade = $idade;
		$this->pai = $pai;
	}
}

$escola = new Escola();

$aluno1 = new Aluno();
$aluno1->nome = 'Zezinho';
$aluno1->setaridadeEPai(5, 'Zezao');

$aluno2 = clone $aluno1;

;
echo '<br>';
echo $aluno1->nome;
echo '<br>';
echo $aluno2->nome;