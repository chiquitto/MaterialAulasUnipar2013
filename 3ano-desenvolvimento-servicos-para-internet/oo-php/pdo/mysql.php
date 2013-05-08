<?php

$con = new PDO(
        'mysql:host=localhost;dbname=aula0705',
        'root',
        'teste');

// Insert
$sql = "INSERT INTO cliente (nome, email)
    VALUES (:nome, :email)";
$stmt = $con->prepare($sql);

$nome = 'Roni';
$email = 'roni@unipar.br';
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->execute();

$nome = 'Willian';
$email = 'willian@unipar.br';
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->execute();

// Delete
$sql = "DELETE FROM cliente WHERE id = :id";
$stmt = $con->prepare($sql);

$id = 1;
$stmt->bindParam(':id', $id);
$stmt->execute();

$res = $con->query('Select * From cliente');

while($linha = $res->fetch(PDO::FETCH_OBJ)){
    echo $linha->nome;
    echo '<br>';
}