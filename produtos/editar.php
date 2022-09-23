<?php
require_once "../config.php";
global $db;
$produtos = array();

$id= $_GET['id'];

$sql ="SELECT * FROM produtos WHERE id = :id";
$sql = $db->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute();
$produto = $sql->fetch();





if(isset($_POST['nome'])){
    $id = ($_POST['nome']);

    $sql = "UPDATE produtos SET nome= :nome WHERE id= :id";
    $sql = $db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->bindValue(":nome");
    $sql->execute();

    if($sql->rowCount() > 0) {
        $produtos = $sql->fetch();
    }


}
    $categorias = array();

    $sql="SELECT * FROM categorias";
    $sql = $db->prepare($sql);
    $sql->execute();

    $categorias = $sql->fetchAll();

    


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
                    <legend>Editar Produto</legend>
                    <form method="POST"> 

                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $produto['nome']?>"/>

                        <label>Categoria</label>
                        <select name="id_categoria" class="form-control">

                            <option value="" disabled selected>Selecione um produto</option>
                        
                            <?php foreach($categorias as $categoria):?>
                                <option value="<?php echo $categoria['id']?>" <?php echo($categoria['id'] == $produto['id_categoria'] ? 'selected' : '')?>> 
                                

                                <?php echo $categoria['nome']?>
                            </option>

                            <?php endforeach;?>    
                        
                            
                        </select>

                        <label>data_validade</label>
                        <input type="date" class="form-control" name="data_validade" value="<?php echo $produto['data_validade']?>"/>

                        <br /><a href="listar.php" class="btn btn-warning">Voltar</a>

                        <button type="submit" class="btn btn-success">Salvar</button>
                    </form>
                </fieldset>
        </div>

    </div>
</body>
</html>