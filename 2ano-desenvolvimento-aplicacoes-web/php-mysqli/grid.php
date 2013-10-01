<?php
require 'conexao.php';

$acao = null;
$id = 0;
$msg = '';

if (isset($_GET['acao'])) {
	$acao = $_GET['acao'];
}
if (isset($_GET['id'])) {
	$id = (int) $_GET['id'];
}

switch($acao) {
	case 'apagar':
		$sql = "DELETE FROM cliente WHERE id = $id";
		$ok = mysqli_query($con, $sql);
		
		if ($ok) {
			$msg = "Você apagou o registro $id";
		}
		else {
			$msg = "Não foi possível apagar o registro $id";
		}
		
		break;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Listar clientes</title>
    </head>
    <body>
	
		<?php if ($msg != '') { ?>
	    <p><?php echo $msg; ?></p>
		<?php } ?>
	
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
	  
	  [<a href="grid.php?id=<?php echo $registro['id']; ?>&acao=apagar">Apagar</a>]
	  
	  <?php if ($registro['status'] != '1') { ?>
	  [<a href="">Ativar</a>]
	  <?php } else { ?>
	  [<a href="">Arquivar</a>]
	  <?php } ?>
	</td>
  </tr>
<?php
}
?>
            </tbody>
        </table>
    </body>
</html>
