<?php
require 'conexao.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Listar clientes</title>
    </head>
    <body>
	
	    <form action="grid.php" method="get">
                <input type="text" name="q">
                <input type="submit" name="submit" value="Pesquisar">
            </form>
	
        <table>
            <caption>Lista de clientes</caption>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Email</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
<?php
$sql = 'SELECT * FROM cliente';

if (isset($_GET['q'])) {
    $q = $_GET['q'];
    // adicionar WHERE ao sql
    $sql .= " WHERE nome LIKE '%$q%'";
}

$resultado = mysqli_query($con, $sql);

while( $registro = mysqli_fetch_array($resultado) ) {
?>
  <tr>
	<td><?php echo $registro['id']; ?></td>
	<td><?php echo $registro['nome']; ?></td>
	<td><?php echo $registro['email']; ?></td>
	<td>
	  [<a href="editar.php?id=<?php echo $registro['id']; ?>">Editar</a>]
	</td>
  </tr>
<?php
}
?>
            </tbody>
        </table>
    </body>
</html>
