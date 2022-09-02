<?php
require_once "config.php";
if (count($_POST) > 0) {

    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];


    $sql = "INSERT INTO usuarios SET nome = :nome, sobrenome = :sobrenome, usuario = :usuario, senha = :senha, data_criacao = NOW()";

    $sql = $db->prepare($sql);
    $sql->bindValue(":nome", $nome);
    $sql->bindValue(":sobrenome", $sobrenome);
    $sql->bindValue(":usuario", $usuario);
    $sql->bindValue(":senha", $senha);
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
                    <legend>Cadastrar Usuário</legend>
                    <form method="POST"> 

                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome"/>

                        <label>Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome"/>

                        <label>Usuário</label>
                        <input type="text" class="form-control" name="usuario"/>

                        <label for="Senha">Senha</label>
                        <input type="text" class="form-control" name="senha"/>

                        <br /><a href="index.php" class="btn btn-warning">Voltar</a>

                        <button type="submit" class="btn btn-success">Salvar</button>
                    </form>
                </fieldset>
            </div>
        </div>


</body>

</html>