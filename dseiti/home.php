<?php
    session_start();
    if((!isset($_SESSION['nome-login']) == true) and (!isset($_SESSION['senha']) == true ))
    {
        unset($_SESSION['nome-login']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASAI</title>
    <link rel="stylesheet" href="assets//css//home.css">
</head>
<body>
    <div class="box">
        <div class="home-box">
            <a href="registro.php">Registro</a>
            <a href="entrada.php">Entrada</a>
            <a href="agendamento.php">Agendamento</a>
            <a href="historico.php">Histórico</a>
            <a href="cozinha.php">Cozinha</a>
            <a href="usuario.php">Usuário</a>
        </div>
    </div>
</body>
</html>