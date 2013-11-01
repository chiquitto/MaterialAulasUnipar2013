<?php
require 'protege.php';

if ($_POST) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    
    $sql = "INSERT INTO cliente (nome,email)
    VALUES ('$nome', '$email')";
    
    require 'conexao.php';
    
    $resultado = mysqli_query($con, $sql);
    
    if (!$resultado) {
        echo mysqli_error($con);
        exit;
    }
    else {
        echo 'Cliente foi salvo';
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastrar clientes</title>
    </head>
    <body>
	
		<h1>Cadastro de cliente</h1>

        <form action="cadastrar.php" method="post">
            Nome: <input type="text" name="nome" value="">
            <br>
            Email: <input type="text" name="email" value="">
            <br>
            <input type="submit" name="submit" value="Salvar">
        </form>

    </body>
</html>