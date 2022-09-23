<?php
require_once "../config.php";


$produtos = array();
global $db;
$sql = "SELECT * FROM produtos ";
$sql = $db ->prepare($sql);
$sql->execute();

if($sql->rowCount()> 0){
    $produtos = $sql->fetchALL();
}


if (count($_POST) > 0) {
    $produtos = $sql->fetchALL();

    
    $nome = $_POST['nome'];

      


    $sql = "UPDATE categorias SET nome = :nome, id_categoria =:id_categoria, data_entrada =:data_entrada, data_saida =:data_saida, data_validade =:validade, qtd =:qtd";

    $sql = $db->prepare($sql);
    $sql->bindValue(":nome", $nome);
    $sql->execute();
    //print_r($sql->errorInfo());exit;

    if ($sql) {
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

    <div class="container fundo">
        <?php require_once "../menu.php"; ?>
        <div class="fundo-conteudo">
            <div class="container">
                <fieldset>
                    <legend>Listar Produtos</legend>
                    
                </fieldset>
                <div class="row">
                    <table>
                        <thead class="table">
                            <th>ID</th>
                            <th>NOME</th>
                            <th>ID CATEGORIA</th>
                            <th>DT ENTRADA</th>
                            <th>DT SAÍDA</th>
                            <th>DT VALIDADE</th>
                            <th>QTD</th>
                        </thead>

                        <tbody>
                        <?php foreach($produtos as $produto):?>
                        <tr>
                            <td><?php echo $produto['id']?></td>
                            <td><?php echo $produto['nome']?></td>
                            <td><?php echo $produto['id_categoria']?></td>
                            <td><?php echo $produto['data_entrada']?></td>
                            <td><?php echo $produto['data_saida']?></td>
                            <td><?php echo $produto['data_validade']?></td>
                            <td><?php echo $produto['qtd']?></td>
                            
                                <td>
                            
                                    <a href="./editar.php?id=<?php echo $produto['id']?>" class="btn btn-warning">Editar</a>
                                     
                                   
                                </td>
                            </tr>
                        <?php endforeach; ?>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    
</body>
</html>