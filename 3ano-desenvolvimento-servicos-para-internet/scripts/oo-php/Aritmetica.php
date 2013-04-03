<?php

class Aritmetica {
	protected $n1;
	protected $n2;

	public function setN1($n1) {
		$this->n1 = $n1;
	}
	public function setN2($n2) {
		$this->n2 = $n2;
	}
}

class Soma extends Aritmetica {
	public function somar() {
		return $this->n1 + $this->n2;
	}
}

$soma = new Soma();
$soma->setN1(5);
$soma->setN2(8);
echo $soma->somar();