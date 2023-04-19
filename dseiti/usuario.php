<?php
    session_start();
    // print_r($_SESSION);

    include('config.php');

    if((!isset($_SESSION['nome-login']) == true) and (!isset($_SESSION['senha']) == true ))
    {
        unset($_SESSION['nome-login']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }

    $logado = $_SESSION['nome-login'];

    //$sql = "SELECT * FROM registros ORDER BY id DESC";

    //$result = $conexao->query($sql);

    //print_r($result);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASAI | Usuário</title>
    <link rel="stylesheet" href="assets//css//usuario.css">
</head>
<body>
    <div class="voltar">
        <a href="home.php">Voltar</a>
    </div>

    <div class="box-box">
        <div class="box">
            <div class="titulo">
                <h1>Usuário:</h1>
            </div>
            <div class="usuario-logado">
                <p>
                    <?php
                    echo $logado;
                    ?>
                </p>
                <a href="sair.php" class="button">Sair</a>
            </div>
        </div>
    </div>
</body>
</html>