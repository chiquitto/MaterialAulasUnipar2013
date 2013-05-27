<?php
$con = mysqli_connect('localhost', 'root', 'teste', 'ecommerce');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Listar clientes</title>
    </head>
    <body>
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
                $sql = 'Select id,nome,email From cliente';
                $resultado = mysqli_query($con, $sql);

                while ($registro = mysqli_fetch_array($resultado)) {
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