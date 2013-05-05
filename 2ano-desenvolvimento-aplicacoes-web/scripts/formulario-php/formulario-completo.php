<?php

$estadosCivis = array('Selecione ...', 'Solteiro', 'Casado', 'Enrolado', 'Divorciado');

$nome = '';
$estcivil = 0;
$empregado = 0;
$sexo = '';
$login = '';
$texto = '';
$interesses = array();

$msg = '';

if ($_POST) {
	//print_r($_POST);
	//exit;

	$nome = $_POST['nome'];
	$estcivil = (int) $_POST['estcivil'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$texto = $_POST['texto'];
	
	if (isset($_POST['empregado'])) {
		$empregado = 1;
	}
	
	if (isset($_POST['sexo'])) {
		$sexo = $_POST['sexo'];
	}
	else {
		$msg .= "Informe seu sexo.\n";
	}
	
	if( isset($_POST['interesses']) ) {
		$interesses = $_POST['interesses'];
	}
	else {
		$msg .= "Informe seus interesses.\n";
	}
	
	if ($nome == '') {
		$msg .= "Informe seu nome.\n";
	}
	if ($estcivil == 0) {
		$msg .= "Informe seu estado civil.\n";
	}
	if ($login == '') {
		$msg .= "Informe seu login.\n";
	}
	if ($senha == '') {
		$msg .= "Informe sua senha.\n";
	}
	if ($texto == '') {
		$msg .= "Informe seu comentário.\n";
	}
	
	if ($msg == '') {
		// Salvar informacoes no BD
		echo 'Salvar informacoes no BD';
		exit;
	}
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de cliente</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <h1>Cadastro de cliente</h1>
		
		<?php if ($msg != '') {
			echo nl2br($msg);
		} ?>

        <form name="form1" action="" method="post">
            <fieldset>
                <legend>Dados pessoais</legend>
Nome: <input type="text" name="nome" value="<?php echo $nome; ?>"><br>

Estado civil:
<!--<select name="estcivil">
	<option value="0"<?php if ($estcivil == 0) { ?> selected<?php } ?>>Selecione ...</option>
	<option value="1"<?php if ($estcivil == 1) { ?> selected<?php } ?>>Solteiro</option>
	<option value="2"<?php if ($estcivil == 2) { ?> selected<?php } ?>>Casado</option>
	<option value="3"<?php if ($estcivil == 3) { ?> selected<?php } ?>>Enrolado</option>
</select>-->


<select name="estcivil">
<?php
foreach ($estadosCivis as $chave => $valor) {
?>
<option value="<?php echo $chave; ?>"<?php if ($estcivil == $chave) { ?> selected<?php } ?>><?php echo $valor; ?></option>
<?php
}
?>
</select>
				<br>

<input type="checkbox" value="1" name="empregado"<?php if ($empregado == 1) { ?> checked<?php } ?>> Atualmente empregado<br>

Sexo:
<input type="radio" value="M" name="sexo"<?php if ($sexo == 'M') { ?> checked<?php } ?>> Masculino
<input type="radio" value="F" name="sexo"<?php if ($sexo == 'F') { ?> checked<?php } ?>> Feminino
            </fieldset>

            <fieldset>
                <legend>Dados de acesso</legend>
                Login: <input type="text" name="login" value="<?php echo $login; ?>"><br>
                Senha: <input type="password" name="senha">
            </fieldset>

            <fieldset>
                <legend>Interesses</legend>
                <select name="interesses[]" multiple>
<option value="E"<?php if (in_array('E', $interesses)) { ?> selected<?php } ?>>Esporte</option>
<option value="P"<?php if (in_array('P', $interesses)) { ?> selected<?php } ?>>Política</option>
<option value="I"<?php if (in_array('I', $interesses)) { ?> selected<?php } ?>>Informática</option>
                </select>
            </fieldset>

            <fieldset>
                <legend>Comentários</legend>
                <textarea name="texto"><?php echo $texto; ?></textarea>
            </fieldset>

            <input type="submit" value="Enviar" name="enviar">

            <input type="hidden" value="Valor enviado como oculto" name="oculto">

        </form>
    </body>
</html>
