<?php
    session_start();
    unset($_SESSION['nome-login']);
    unset($_SESSION['senha']);
    header('Location: backup.php');
?>