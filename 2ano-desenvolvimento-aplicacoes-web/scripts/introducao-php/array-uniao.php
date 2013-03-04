<?php
$a = array("a" => "maçã", "b" => "banana");
$b = array("a" =>"pêra", "b" => "framboesa", "c" => "morango");

$c = $a + $b; // Uniao de $a e $b
echo 'União de \$a e \$b:';
print_r($c);
echo '<br><br>';

$c = $b + $a; // União de $b e $a
echo "União de \$b e \$a: \n";
print_r($c);
echo '<br>';


