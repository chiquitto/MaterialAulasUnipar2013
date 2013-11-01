<?php
if ($_POST) {
	$login = $_POST['login'];
	$senha = md5('unipar' . $_POST['senha'] . 'unipar');
	
	$sql = "Select * From usuario
	Where (login = '$login') And (senha = '$senha')";
	
	require 'conexao.php';
	$resultado = mysqli_query($con, $sql);
	
	if ($resultado->num_rows != 1) {
		echo 'Login e/ou senha incorretos';
		exit;
	}
	else {
		session_start();
		$_SESSION['logado'] = 1;
		
		$registro = mysqli_fetch_array($resultado);
		
		$_SESSION['nome'] = $registro['nome'];
		
		header('location:index.php');
		exit;
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
	
		<h1>Login de usuário</h1>

        <form action="login.php" method="post">
            Login: <input type="text" name="login" value="">
            <br>
            Senha: <input type="password" name="senha" value="">
            <br>
            <input type="submit" name="submit" value="Salvar">
        </form>

    </body>
</html>