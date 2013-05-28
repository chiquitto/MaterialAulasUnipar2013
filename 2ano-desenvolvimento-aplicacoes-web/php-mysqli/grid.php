<?php
$c = mysqli_connect('localhost','root','teste','aula');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Listar clientes</title>
    </head>
    <body>
	
	    <form action="grid.php" method="get">
		  input texto com o que o usuario vai buscar
		  
		  botao ok
		</form>
	
        <table>
            <caption>Lista de clientes</caption>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Email</td>
                </tr>
            </thead>
            <tbody>
<?php
$sql = 'SELECT * FROM cliente';

$q = $_GET[''];
if ($q != '') {
	// adicionar WHERE ao sql
	$sql .= " WHERE nome LIKE '%$q%'";
}

$resultado = mysqli_query($c, $sql);

while( $registro = mysqli_fetch_array($resultado) ) {
?>
  <tr>
	<td><?php echo $registro['id']; ?></td>
	<td><?php echo $registro['nome']; ?></td>
	<td><?php echo $registro['email']; ?></td>
  </tr>
<?php
}
?>
            </tbody>
        </table>
    </body>
</html>