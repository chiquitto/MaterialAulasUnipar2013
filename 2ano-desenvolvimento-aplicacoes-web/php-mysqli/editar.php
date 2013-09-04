<?php
require 'conexao.php';

if (isset($_POST['id'])) {
	$id = (int) $_POST['id'];
}
else if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];
}
else {
	$id = 0;
}

$sql = "SELECT nome,email FROM cliente
WHERE id = $id";

$resultado = mysqli_query($con, $sql);

if ($resultado->num_rows == 0) {
	echo('O cliente não existe.');
	exit;
}

if ($_POST) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	
	// Validacoes
	if ($nome == '') {
		echo 'Informe o nome do cliente';
		exit;
	}
	
	$sql = "UPDATE cliente SET 
	nome = '$nome', email = '$email'
	WHERE id = $id";
	
	$ok = mysqli_query($con, $sql);
	
	if ($ok === false) {
		echo 'Houve um erro no UPDATE';
		exit;
	}
	
	echo 'Registro atualizado';
	exit;
}
else {
	$linha = mysqli_fetch_array($resultado);

	$nome = $linha['nome'];
	$email = $linha['email'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Editar clientes</title>
    </head>
    <body>
	
		<h1>Editar cliente</h1>

        <form action="editar.php" method="post">
            Nome: <input type="text" name="nome" value="<?php echo $nome; ?>">
            <br>
            Email: <input type="text" name="email" value="<?php echo $email; ?>">
            <br>
            <input type="submit" name="submit" value="Salvar">
			
			<input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>

    </body>
</html>