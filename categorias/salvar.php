<?php
require_once"../config.php";
global $db;
$categoria = $_POST['nome'];
$id= $_POST['id'];


$sql ="UPDATE categoria SET nome = :categoria WHERE id = :id";
$sql = $db->prepare($sql);
$sql->bindValue(":categoria", $categoria);
$sql->bindValue(":id", $id);
$sql->execute();

header("Location: editar.php");
?>


