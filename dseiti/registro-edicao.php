<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {   
        
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $nome_antigo = $_POST['nome_antigo'];
        $nomeTradicional = $_POST['nome_tradicional'];
        $sexo = $_POST['sexo'];
        $nascimento = $_POST['data_nascimento'];
        $indigena = $_POST['indigena'];
        $etinia = $_POST['etinia'];
        $aldeia = $_POST['aldeia'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $sus = $_POST['cartao_sus'];
        $complemento = $_POST['complemento'];

        $sqlUpdate = "UPDATE registros SET nome='$nome', nome_tradicional='$nomeTradicional', sexo='$sexo',data_nascimento='$nascimento',indigena='$indigena',etinia='$etinia',aldeia='$aldeia',cpf='$cpf',rg='$rg',cartao_sus='$sus',complemento='$complemento' WHERE id='$id'";
        $sqlUpdate2 = "UPDATE entradas SET nome='$nome', etinia='$etinia' WHERE nome='$nome_antigo'";
        $sqlUpdate3 = "UPDATE agendamentos SET nome='$nome', etinia='$etinia' WHERE nome='$nome_antigo'";

        $result = $conexao->query($sqlUpdate);
        $result2 = $conexao->query($sqlUpdate2);
        $result3 = $conexao->query($sqlUpdate3);

        header('Location: historico-registros.php');
    }

    else
    {
        header('Location: historico-registros.php');
    }
?>