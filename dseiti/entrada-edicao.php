<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {   
        
        $id = $_POST['id'];
        $tipo_hospedagem = $_POST['tipo_hospedagem'];
        $hospital = $_POST['hospital'];
        $tipo_consulta = $_POST['tipo_consulta'];
        $data_consulta = $_POST['data_consulta'];
        $observacoes = $_POST['observacoes'];
        $realizou = $_POST['realizou'];
        $data_entrada = $_POST['data_entrada'];
        $data_saida = $_POST['data_saida'];

        $sqlUpdate = "UPDATE entradas SET tipo_Hospedagem='$tipo_hospedagem',hospital='$hospital',tipo_Consulta='$tipo_consulta',data_consulta='$data_consulta',observacoes='$observacoes',realizou='$realizou',data_Entrada='$data_entrada',data_Saida='$data_saida' WHERE identradas='$id'";

        $result = $conexao->query($sqlUpdate);

        //   if($conexao->connect_errno)
        //   {  
        //       echo "Erro";
        //   }
        //   else
        //   {
        //       echo "Conectado";
        //   }

        //   echo $id;
        //   echo $nome;
        //   echo $nomeTradicional;
        //   echo $sexo;
        //   echo $nascimento;
        //   echo $indigena;
        //   echo $etinia;
        //   echo $aldeia;
        //   print_r('---');
        //   echo $cpf;
        //   print_r('---');
        //   echo $sus;
        //   echo $complemento;

        header('Location: historico-entradas.php');
    }

    else
    {
        header('Location: historico-entradas.php');
    }
?>