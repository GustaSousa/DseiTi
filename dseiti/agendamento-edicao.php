<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {   
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $etinia = $_POST['etinia'];
        $hospital = $_POST['hospital'];
        $tipo_consulta = $_POST['tipo_consulta'];
        $data_consulta = $_POST['data_consulta'];
        $realizou = $_POST['realizou'];

        $sqlUpdate = "UPDATE agendamentos SET nome='$nome',etinia='$etinia',hospital='$hospital',tipo_consulta='$tipo_consulta',data_consulta='$data_consulta',realizou='$realizou' WHERE idagendamentos='$id'";

        $result = $conexao->query($sqlUpdate);

        header('Location: historico-agendamentos.php');
    }

    else
    {
        header('Location: historico-agendamentos.php');
    }
?>