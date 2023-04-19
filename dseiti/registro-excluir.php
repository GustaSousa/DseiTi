<?php
    if(!empty($_GET['id']))
    {

        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM registros WHERE id=$id";

        $result = $conexao->query($sqlSelect); 

        if($result-> num_rows > 0)
        {
            $sqlDelete = "DELETE FROM registros WHERE id=$id";
            $resulteDelete = $conexao->query($sqlDelete);
            header('Location: historico-registros.php');

        }
        else
        {
            header('Location: historico-registros.php');
        }
            
    }
?>