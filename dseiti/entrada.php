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
        $id_pc = $_POST['id_pc'];
        $local_origem = $_POST['local_origem'];
        $local_destino = $_POST['local_destino'];
        $motorista = $_POST['motorista'];
        $data_saida = $_POST['data_saida'];
        $complemento = $_POST['complemento'];

        $result = mysqli_query($conexao, "INSERT INTO entradas (nome,id_pc,local_origem,local_destino,motorista,data_saida,complemento) VALUES ('$nome','$id_pc','$local_origem','$local_destino','$motorista','$data_saida','$complemento')");

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
    <title>Entradas</title>
    <link rel="stylesheet" href="assets/css/style.css">
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
                
                <div class="inputBox">
                        <input type="text" name="id_pc" id="id_pc" class="inputUser" maxlength="45" placeholder="" autocomplete="off" required>
                        <label for="id_pc" class="lableInput">ID</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="local_origem" id="local_origem" class="inputUser" maxlength="45" placeholder="" list="polos" autocomplete="off" required>
                    <label for="local_origem" class="lableInput">Local de Origem</label>
                    <datalist id="polos">
                        <option value="Atikum">
                        <option value="Atikum Salgueiro">
                        <option value="Dsei TI">
                        <option value="Funil-Ô">
                        <option value="Kambiwá">
                        <option value="Kapinawá">
                        <option value="Pankará">
                        <option value="Pankararu">
                        <option value="Pankararu Entre Serras">
                        <option value="Pipipã">
                        <option value="Truká">
                        <option value="Truká Orocó">
                        <option value="Tuxá">
                        <option value="Tuxí">
                        <option value="Xukuru de Cimbres">
                        <option value="Xukuru de Ororubá">
                    </datalist>
                    </div>
                                                    
                <div class="inputBox">
                    <input type="text" name="local_destino" id="local_destino" class="inputUser" maxlength="45" placeholder="" list="polos" autocomplete="off">
                    <label for="local_destino" class="lableInput">Local de Destino</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="motorista" id="motorista" class="inputUser" maxlength="45" placeholder="">
                    <label for="motorista" class="lableInput">Motorista</label>
                </div>
                
                <div class="inputBox">
                    <label for="data_saida">Data De Saída:</label>
                    <input type="datetime-local" name="data_saida" id="data_saida" class="inputUser" required>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="complemento" id="complemento" class="inputUser" maxlength="90" placeholder="" autocomplete="off">
                    <label for="nome" class="lableInput">Complemento</label>
                </div>
                
                <input type="submit" name="submit" id="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
</body>
</html>