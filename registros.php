
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
    <div class="fundo-menu">
    <a href="novo_produto.php">
        <div class="botao-menu">
            <img src="./img/mais.png" alt="" srcset=""/>
        </div>
        </a>
    <a href="busca.php">
        <div class="botao-menu">
            <img src="./img/lupa.png" alt="">
        </div>
    </a>
   
    
    </div>
    <div class="fundo-conteudo">
        <fieldset>
           
                <hr/>
                    <a href="registros.php" class="btn btn primary"></a>
                </hr>
        </fieldset>
            <h4>Listando os Registros</h4>
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Data_Criacao</th>
                    <th>Usuario</th>
                    <th>Opcoes</th>
                </thead>

                <tbody>
                    <?php foreach($dados as $dado):?>
                        <tr>
                            <td><?php echo $dado['id']?></td>
                            <td><?php echo $dado['nome']?></td>
                            <td><?php echo $dado['sobrenome']?></td>
                            <td><?php echo $dado['data_criacao']?></td>
                            <td><?php echo $dado['usuario']?></td>
                            <td>
                                <a href="excluir.php?id=<?php echo $dado['id']?>" class="btn btn-danger">Excluir</a>
                                <a href="editar.php?id=<?php echo $dado['id']?>" class="btn btn-warning">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>    
                </tbody>
            </table>
    </div>
</div>

</body>
</html>