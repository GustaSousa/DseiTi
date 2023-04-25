<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {   
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $id_pc = $_POST['id_pc'];
        $local_origem = $_POST['local_origem'];
        $local_destino = $_POST['local_destino'];
        $motorista = $_POST['motorista'];
        $data_saida = $_POST['data_saida'];
        $complemento = $_POST['complemento'];

        $sqlUpdate = "UPDATE entradas SET local_origem='$local_origem',local_destino='$local_destino',motorista='$motorista',data_saida='$data_saida',complemento='$complemento' WHERE identradas='$id'";
        $sqlUpdate2 = "UPDATE registros SET local_atual='$local_destino' WHERE id='$id_pc'";

        $result = $conexao->query($sqlUpdate);
        $result2 = $conexao->query($sqlUpdate2);

        header('Location: historico-entradas.php');
    }

    else
    {
        header('Location: historico-entradas.php');
    }
?>