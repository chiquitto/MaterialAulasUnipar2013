<?php

$origem = 'Cianorte';
$destino = 'Jundiai';

$opcoes = array(
    'origin' => $origem,
    'destination' => $destino,
    'region' => 'br',
    'sensor' => 'false',
    'language' => 'pt-BR',
    //'alternatives' => 'true',
);

$opcoes = http_build_query($opcoes);

$url = 'http://maps.googleapis.com/maps/api/directions/json?' . $opcoes;

$string = file_get_contents($url);
$json = json_decode($string, true);

$rota = $json['routes'][0];
$perna = $rota['legs'][0];
$passos = $perna['steps'];

?>

<h1>Calcular rota entre <?php echo $origem; ?> até <?php echo $destino; ?></h1>

<h2>Rota 1</h2>

<p>Origem: <?php echo $perna['start_address']; ?></p>
<p>Destino: <?php echo $perna['end_address']; ?></p>

<h3>Passos</h3>
<ol>

<?php
$i = 1;
foreach($passos as $passo) {

    ?><li><?php echo $passo['html_instructions']; ?></li><?php

    $i++;
}
?>

</ol>

<?php

//echo 'Quantidade de rotas: ' . count($rotas);

//print_r($perna);