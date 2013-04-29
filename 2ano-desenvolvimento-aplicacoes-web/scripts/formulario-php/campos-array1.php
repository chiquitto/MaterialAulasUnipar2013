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
            <ul>
              <li>
                <input type="checkbox" name="selecionado[1]" value="1">
                Didi
              </li>
              <li>
                <input type="checkbox" name="selecionado[3]" value="1">
                Zacarias
              </li>
              <li>
                <input type="checkbox" name="selecionado[7]" value="1">
                Mussum
              </li>
              <li>
                <input type="checkbox" name="selecionado[9]" value="1">
                Dede
              </li>
            </ul>


            <input type="submit" value="Apagar selecionados" name="enviar">

        </form>
    </body>
</html>
