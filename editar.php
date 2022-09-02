<?php

require_once "config.php";
$id = $_GET['id'];
global $db;
$informacoes = array();

$sql = "SELECT * FROM usuarios WHERE id = :id";
$sql = $db->prepare($sql);
$sql->bindValue(":id", $id);
$sql->execute();

if ($sql->rowCount() > 0) {
    $informacoes = $sql->fetch();
}else{
    echo "<h1>Usuario nao existe</h1>";
    exit;
}

if ($_POST){

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $senha = $_POST['senha'];
    $usuario = $_POST['usuario'];
    $sql = "UPDATE usuarios SET  nome = :nome, sobrenome = :sobrenome, senha= :senha, usuario= :usuario WHERE id = :id";

$sql = $db->prepare($sql);
$sql->bindValue(":id", $id);
$sql->bindValue(":nome", $nome);
$sql->bindValue(":sobrenome", $sobrenome);
$sql->bindValue(":senha", $senha);
$sql->bindValue(":usuario", $usuario);
$sql->execute();
if($sql){
    header("location:registros.php");
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Usuario</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/estilo.css">

</head>

<body>
    <div class="container fundo">
        <div class="fundo-menu">
            <a href="#">
                <div class="botao-menu">
                    <img src="./img/mais.png" alt="" srcset="" />
                </div>
            </a>
            <a href="#">
                <div class="botao-menu">
                    <img src="./img/lupa.png" alt="">
                </div>
            </a>
        </div>
        <div class="fundo-conteudo">
            <div class="container">
                <fieldset>
                    <legend>Editar Usuário</legend>
                    <form method="POST"> 
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $informacoes ['nome']?>" />

                        <label>Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" value="<?php echo $informacoes ['sobrenome']?>" />

                        <label>Usuário</label>
                        <input type="text" class="form-control" name="usuario" value="<?php echo $informacoes ['usuario']?>" />

                        <label for="Senha">Senha</label>
                        <input type="password" class="form-control" name="senha" value="<?php echo $informacoes ['senha']?>"/>

                        <br /><a href="registros.php" class="btn btn-warning">Voltar</a>

                        <button type="submit" class="btn btn-success">Salvar</button>
                    </form>
                </fieldset>
            </div>
        </div>


</body>

</html>