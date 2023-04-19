<?php
    if(!empty($_GET['id']))
    {

        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM agendamentos WHERE idagendamentos=$id";

        $result = $conexao->query($sqlSelect); 

        if($result-> num_rows > 0)
        {
            $sqlDelete = "DELETE FROM agendamentos WHERE idagendamentos=$id";
            $resulteDelete = $conexao->query($sqlDelete);
            header('Location: historico-agendamentos.php');

        }
        else
        {
            header('Location: historico-agendamentos.php');
        }
            
    }
?>