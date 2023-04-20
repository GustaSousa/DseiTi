<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {   
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $nome_antigo = $_POST['nome_antigo'];
        $patrimonio = $_POST['patrimonio'];
        $tombamento = $_POST['tombamento'];
        $descricao = $_POST['descricao'];
        $status = $_POST['status'];
        
        $sqlUpdate = "UPDATE registros SET nome='$nome', patrimonio='$patrimonio', tombamento='$tombamento',descricao='$descricao',status='$status' WHERE id='$id'";
        $sqlUpdate2 = "UPDATE entradas SET nome='$nome' WHERE nome='$nome_antigo'";

        $result = $conexao->query($sqlUpdate);
        $result2 = $conexao->query($sqlUpdate2);

        header('Location: historico-registros.php');
    }

    else
    {
        header('Location: historico-registros.php');
    }
?>