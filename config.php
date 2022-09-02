<?php

$banco = "estoque";
$usuario = "root";
$senha = "";
$host = "localhost";
$url = 'http://localhost/estoque/';
global $db;

try {
    $db = new PDO ("mysql:host=". $host .";dbname=" . $banco, $usuario, $senha);
} catch( PDOException $e) {
    echo $e->getMessage();
}
