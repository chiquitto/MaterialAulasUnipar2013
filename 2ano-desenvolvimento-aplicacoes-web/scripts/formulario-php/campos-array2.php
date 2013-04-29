<?php

$msg = '';

if ($_POST) {
    print_r( $_POST );
    exit;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lista de cliente</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <h1>Lista de clientes</h1>
		
		<?php if ($msg != '') {
			echo nl2br($msg);
		} ?>

        <form name="form1" action="" method="post">
            
            <fieldset>
              <legend>Cliente 1</legend>
              
              Nome: <input type="text" name="cliente[0][nome]">
              <br>
              Email: <input type="text" name="cliente[0][email]">
            </fieldset>
            
            <fieldset>
              <legend>Cliente 2</legend>
              
              Nome: <input type="text" name="cliente[1][nome]">
              <br>
              Email: <input type="text" name="cliente[1][email]">
            </fieldset>
            
            <fieldset>
              <legend>Cliente 2</legend>
              
              Nome: <input type="text" name="cliente[2][nome]">
              <br>
              Email: <input type="text" name="cliente[2][email]">
            </fieldset>
            
            <input type="submit" value="Cadastrar" name="enviar">

        </form>
    </body>
</html>
