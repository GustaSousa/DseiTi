<?php

session_start();

 // print_r($_REQUEST)
 if(isset($_POST['submit']) && !empty($_POST['nome-login']) && !empty($_POST['senha']))
 {
    include_once('config.php');
    $login = $_POST['nome-login'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM administradores WHERE login = '$login' and senha = '$senha'";

    $result = $conexao->query($sql);

    // print_r($result);
    // print_r($sql);

   if(mysqli_num_rows($result) < 1)
   {
      unset($_SESSION['nome-login']);
      unset($_SESSION['senha']);
      header('Location: login.php');
   }
   else
   {
      $_SESSION['nome-login'] = $login;
      $_SESSION['senha'] = $senha;
      header('Location: home.php');
   }
 }
 else
 {
    header('Location: login.php');
 }
?>