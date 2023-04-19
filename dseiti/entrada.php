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
        $tipo_hospedagem = $_POST['tipo_hospedagem'];
        $hospital = $_POST['hospital'];
        $tipo_consulta = $_POST['tipo_consulta'];
        $data_consulta = $_POST['data_consulta'];
        $observacoes = $_POST['observacoes'];
        $data_entrada = $_POST['data_entrada'];
        $data_saida = $_POST['data_saida'];

        $result = mysqli_query($conexao, "INSERT INTO entradas (nome,etinia,tipo_hospedagem,hospital,tipo_consulta,data_consulta,observacoes,data_entrada,data_saida) VALUES ('$nome','$etinia','$tipo_hospedagem','$hospital','$tipo_consulta','$data_consulta','$observacoes','$data_entrada','$data_saida')");

        header('Location: historico-entradas.php');
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
    <title>CASAI | Entradas</title>
    <link rel="stylesheet" href="assets//css/style.css">
</head>
<body>
    <div class="voltar">
        <a href="home.php">Voltar</a>
    </div>

    <div class="box">
        <form action="entrada.php" method="POST">
            <fieldset>
                <legend><b>Entrada e Saída</b></legend>
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
                
                <div class="genderInputs">
                    <div class="genderTitle">
                        <p>Tipo de Hospedagem:</p>
                    </div>
                    <div class="tipo-hospedagem-group">
                        <div class="tipo-hospedagem-input">
                            <input id="visitante
                                            
                            '" type="radio" name="tipo_hospedagem" value="Visitante" required>
                            <label for="visitante">Visitante</label>
                        </div>
                        <div class="gender-input">
                            <input id="acompanhante" type="radio" name="tipo_hospedagem" value="Acompanhante" required>
                            <label for="acompanhante">Acompanhante</label>
                        </div>
                    </div>
                </div>

                <br>

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

                <div class="inputBox">
                    <input type="text" name="observacoes" id="observacoes" class="inputUser" maxlength="45" placeholder="" autocomplete="off">
                    <label for="nome" class="lableInput">Observações</label>
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
                <br>
                -->

                <div class="inputBox">
                    <label for="data_entrada">Data De Entrada:</label>
                    <input type="datetime-local" name="data_entrada" id="data_entrada" class="inputUser" required>
                </div>

                <div class="inputBox">
                    <label for="data_saida">Data De Saída:</label>
                    <input type="datetime-local" name="data_saida" id="data_saida" class="inputUser" required>
                </div>

                <input type="submit" name="submit" id="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
</body>
</html>