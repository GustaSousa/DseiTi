<?php
    session_start();
    include_once('config.php');
    if((!isset($_SESSION['nome-login']) == true) and (!isset($_SESSION['senha']) == true ))
    {
        unset($_SESSION['nome-login']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    
    if(isset($_POST['submit']))
    {

        $nome = $_POST['nome'];
            $sqlEtinia = "SELECT etinia FROM registros WHERE nome='$nome'";
            $resultEtinia = $conexao->query($sqlEtinia);
            $registros_etinia = mysqli_fetch_assoc($resultEtinia);
        $etinia = $registros_etinia ['etinia'];
        $hospital = $_POST['hospital'];
        $tipo_consulta = $_POST['tipo_consulta'];
        $data_consulta = $_POST['data_consulta'];
        $realizou = $_POST['realizou'];

        $result = mysqli_query($conexao, "INSERT INTO agendamentos (nome,etinia,hospital,tipo_consulta,data_consulta,realizou) VALUES ('$nome','$etinia','$hospital','$tipo_consulta','$data_consulta','$realizou')");

        header('Location: historico-agendamentos.php');
    }
        $sqlNome = "SELECT nome FROM registros ORDER BY nome ASC";
    
        $resultNome = $conexao->query($sqlNome);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASAI | Agendamentos</title>
    <link rel="stylesheet" href="assets//css/style.css">
</head>
<body>
    <div class="voltar">
        <a href="home.php">Voltar</a>
    </div>

    <div class="box">
        <form action="agendamento.php" method="POST">
            <fieldset>
                <legend><b>Agendamento de Consultas</b></legend>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" maxlength="45" placeholder="SELECIONE UM NOME JÁ REGISTRADO!" list="nomes" autocomplete="off" required>
                    <label for="nome" class="lableInput">Nome</label>
                    <datalist id="nomes">
                    <?php 
                        while($registros_data = mysqli_fetch_assoc($resultNome)){
                            echo "<option value='".$registros_data ['nome']."'></option>";
                            }
                    ?>
                    </datalist>
                </div>
                <!--
                    <div class="inputBox">
                        <input type="text" name="etinia" id="etinia" class="inputUser" maxlength="45" placeholder="">
                        <label for="etinia" class="lableInput">Etinia</label>
                    </div>
                -->
                <div class="inputBox">
                    <input type="text" name="hospital" id="hospital" class="inputUser" maxlength="45" placeholder="">
                    <label for="hospital" class="lableInput">Hospital</label>
                </div>

                <div class="inputBox">
                    <input type="text" name="tipo_consulta" id="tipo_consulta" class="inputUser" maxlength="20" placeholder="">
                    <label for="tipo_consulta" class="lableInput">Tipo Da Consulta</label>
                </div>

                <div class="inputBox">
                    <label for="data_consulta">Data Da Consulta:</label>
                    <input type="datetime-local" name="data_consulta" id="data_consulta" class="inputUser">
                </div>
<!--
                <div class="genderInputs">
                    <div class="genderTitle">
                        <p>Realizou</p>
                    </div>
                    <div class="realizou-group">
                        <div class="realizou-input">
                            <input id="yes" type="radio" name="realizou" value="Sim">
                            <label for="yes">Sim</label>
                        </div>
                        <div class="realizou-input">
                            <input id="no" type="radio" name="realizou" value="Não">
                            <label for="no">Não</label>
                        </div>
                    </div>
                </div>
                        -->
                <br>

                <input type="submit" name="submit" id="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
</body>
</html>