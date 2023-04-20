<?php
    session_start();
    if((!isset($_SESSION['nome-login']) == true) and (!isset($_SESSION['senha']) == true ))
    {
        unset($_SESSION['nome-login']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    
    if(isset($_POST['submit']))
    {

        include_once('config.php');

        $nome = $_POST['nome'];
        $patrimonio = $_POST['patrimonio'];
        $tombamento = $_POST['tombamento'];
        $descricao = $_POST['descricao'];
        $status = $_POST['status'];

        $result = mysqli_query($conexao, "INSERT INTO registros (nome,patrimonio,tombamento,descricao,status) VALUES ('$nome','$patrimonio','$tombamento','$descricao','$status')");

        header('Location: home.php');
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        function mascara_cpf(){
            var cpf = document.getElementById('cpf')
            if(cpf.value.length == 3 || cpf.value.length == 7) {
                cpf.value += '.'
            }
            else if(cpf.value.length == 11){
                cpf.value += '-'
            }
        }
    </script>
</head>
<body>
    <div class="voltar">
        <a href="home.php">Voltar</a>
    </div>
    <div class="box-box">
        <div class="box" in="content">
            <form action="registro.php" method="POST">
                <fieldset>
                    <legend><b>Registro</b></legend>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" maxlength="45" placeholder="Digite O Nome Completo (Obrigatório)" autocomplete="off" required>
                        <label for="nome" class="lableInput">Nome</label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="patrimonio" id="patrimonio" class="inputUser" maxlength="45" placeholder="" autocomplete="off">
                        <label for="patrimonio" class="lableInput">Patrimônio</label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="tombamento" id="tombamento" class="inputUser" maxlength="45" placeholder="" autocomplete="off">
                        <label for="tombamento" class="lableInput">Tombamento</label>
                    </div>
                    <div class="statusInputs">
                        <div class="statusTitle">
                            <p>Status:</p>
                        </div>
                        <div class="status-group">
                            <div class="status-input">
                                <input id="funcionando" type="radio" name="status" value="Funcionando" required>
                                <label for="funcionando">Funcionando</label>
                            </div>
                            <div class="status-input">
                                <input id="parado" type="radio" name="status" value="Parado" required>
                                <label for="parado">Parado</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="inputBox">
                        <input type="text" name="descricao" id="descricao" class="inputUser" maxlength="90" placeholder="" autocomplete="off">
                        <label for="descricao" class="lableInput">Descrição</label>
                    </div>

                    <br>

                    <!-- <div class="inputBox">
                        <input type="text" name="cpf" id="cpf" class="inputUser" minlength="14" maxlength="14"  placeholder="xxx.xxx.xxx-xx (Obrigatório)" autocomplete="off" onkeypress="mascara_cpf()" required>
                        <label for="cpf" class="lableInput">CPF</label>
                    </div> -->
                    
                    <input type="submit" name="submit" id="submit" value="Enviar">
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>