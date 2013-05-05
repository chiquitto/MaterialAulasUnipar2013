<?php

$msg = '';

if ($_POST) {
	if ( isset($_POST['selecionado']) ) {
		$apagar = array_keys($_POST['selecionado']);
		
		echo 'Os clientes que ser�o apagados s�o: ' . join(', ', $apagar);
		
		exit;
	}
	else {
		$msg .= '� necess�rio selecionar no m�nimo 1 cliente';
	}
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
