<?php
    if(!empty($_GET['id']))
    {

        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM entradas WHERE identradas=$id";

        $result = $conexao->query($sqlSelect); 

        if($result-> num_rows > 0)
        {
            $sqlDelete = "DELETE FROM entradas WHERE identradas=$id";
            $resulteDelete = $conexao->query($sqlDelete);
            header('Location: historico-entradas.php');

        }
        else
        {
            header('Location: historico-entradas.php');
        }
            
    }
?>