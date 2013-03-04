<?php

$xml = '<?xml version="1.0"?>
<clientes>
  <cliente>
    <nome>Geraldo Santos</nome>
    <email>geraldo.santos@gmail.com</email>
  </cliente>
  <cliente>
    <nome>Arquibancada do Corinthians</nome>
    <email>arquibancada.corinthians@gmail.com</email>
  </cliente>
</clientes>';
$clientes = new SimpleXMLElement($xml);
?>
<h1>Nomes</h1>
<p><?php echo ((string) $clientes->cliente[0]->nome); ?><br>
<?php echo ((string) $clientes->cliente[1]->nome); ?></p>

<h1>Emails</h1>
<?php foreach($clientes->cliente as $cliente) {
    echo ((string) $cliente->email) . "<br>";
} ?>