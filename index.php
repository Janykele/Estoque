<?php

require_once "config.php";

global $db;
$sql = "SELECT * FROM usuarios ";
$sql = $db ->prepare($sql);
 $usuarios = $sql->execute();

$dados = $sql->fetchALL();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilo.css">

</head>
<body>


<div class="container fundo">
    <?php require_once "./menu.php";?>

    
    <div class="fundo-conteudo">
        <div class="mensagem-bem-vindo">
            <a href="registros.php" class="btn btn-primary">Ir para Cadastros</a>
        </div>
    </div>
</div>


</body>
</html>