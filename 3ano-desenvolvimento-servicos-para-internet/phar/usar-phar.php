<?php

//include 'phar://classes.phar';

include 'phar://classes.phar/Escola.php';
include 'phar://classes.phar/Pessoa.php';
include 'phar://classes.phar/Aluno.php';

$escola1 = new Escola();
$escola2 = new Escola();

$aluno1 = new Aluno();
$aluno1->setRa(1111);
$aluno1->setNome('Aluno 1');

$aluno2 = new Aluno();
$aluno2->setRa(2222);
$aluno2->setNome('Aluno 2');

$aluno3 = new Aluno();
$aluno3->setRa(3333);
$aluno3->setNome('Aluno 3');

$aluno4 = new Aluno();
$aluno4->setRa(4444);
$aluno4->setNome('Aluno 4');

$aluno5 = new Aluno();
$aluno5->setRa(5555);
$aluno5->setNome('Aluno 5');

$escola1->matricular($aluno1);
$escola1->matricular($aluno2);
$escola1->matricular($aluno3);
$escola1->matricular($aluno4);
$escola1->matricular($aluno5);

$escola1->transferirAluno(3333, $escola2);
$escola1->transferirAluno(4444, $escola2);
$escola1->transferirAluno(2222, $escola2);
$escola1->transferirAluno(1111, $escola2);

$escola2->transferirAluno(3333, $escola1);

$alunosEscola1 = $escola1->getAlunos();
$alunosEscola2 = $escola2->getAlunos();

?>
<h1>Alunos da escola 1</h1>
<?php

foreach($alunosEscola1 as $aluno) {
	echo $aluno->getNome() . '<br>';
}

?>
<h1>Alunos da escola 2</h1>
<?php

foreach($alunosEscola2 as $aluno) {
	echo $aluno->getNome() . '<br>';
}

?>
