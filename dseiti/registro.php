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
        // print_r($_POST['nome']);
        // print_r($_POST['nomet']);
        // print_r($_POST['gender']);
        // print_r($_POST['is_indigenous']);

        include_once('config.php');

        $nome = $_POST['nome'];
        $nomeTradicional = $_POST['nomet'];
        $sexo = $_POST['gender'];
        $nascimento = $_POST['data_nasc'];
        $indigena = $_POST['is_indigenous'];
        $etinia = $_POST['etinia'];
        $aldeia = $_POST['aldeia'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $sus = $_POST['cartaoSus'];
        $complemento = $_POST['complemento'];

        $result = mysqli_query($conexao, "INSERT INTO registros (nome,nome_tradicional,sexo,data_nascimento,indigena,etinia,aldeia,cpf,rg,cartao_sus,complemento) VALUES ('$nome','$nomeTradicional','$sexo','$nascimento','$indigena','$etinia','$aldeia','$cpf','$rg','$sus','$complemento')");

        header('Location: home.php');
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASAI | Registro</title>
    <link rel="stylesheet" href="assets//css//style.css">
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
    <script>
        function mascara_rg(){
            var rg = document.getElementById('rg')
            if(rg.value.length == 1 || rg.value.length == 5) {
                rg.value += '.'
            }
        }
    </script>
    <script>
        function mascara_sus(){
            var sus = document.getElementById('cartaoSus')
            if(sus.value.length == 3 || sus.value.length == 8 || sus.value.length == 13) {
                sus.value += ' '
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
                        <label for="nome" class="lableInput">Nome Completo</label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="nomet" id="nomet" class="inputUser" maxlength="45" placeholder="" autocomplete="off">
                        <label for="nomet" class="lableInput">Nome Tradicional</label>
                    </div>
                    <div class="genderInputs">
                        <div class="genderTitle">
                            <p>Sexo:</p>
                        </div>
                        <div class="gender-group">
                            <div class="gender-input">
                                <input id="female" type="radio" name="gender" value="Feminino" required>
                                <label for="female">Feminino</label>
                            </div>
                            <div class="gender-input">
                                <input id="male" type="radio" name="gender" value="Masculino" required>
                                <label for="male">Masculino</label>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="inputBox">
                        <label for="data_nasc">Data de Nascimento:</label>
                        <input type="date" name="data_nasc" id="data_nasc" class="inputUser" required>
                    </div>
                    <div class="indigenousInputs">
                        <div class="indigenousTitle">
                            <p>Indigena:</p>
                        </div>
                        <div class="indigenous-group">
                            <div class="indigenous-input">
                                <input id="yes" type="radio" name="is_indigenous" value="Sim" required>
                                <label for="yes">Sim</label>
                            </div>
                            <div class="indigenous-input">
                                <input id="no" type="radio" name="is_indigenous" value="Não" required>
                                <label for="no">Não</label>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="inputBox">
                        <input type="text" name="etinia" id="etinia" class="inputUser" maxlength="30" placeholder="" list="etinias" autocomplete="off">
                        <label for="etinia" class="lableInput">Etinia</label>
                        <datalist id="etinias">
                            <option value="Atikum">
                            <option value="Atikum Salgueiro">
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
                        <input type="text" name="aldeia" id="aldeia" class="inputUser" maxlength="30" placeholder="">
                        <label for="aldeia" class="lableInput">Aldeia</label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="cpf" id="cpf" class="inputUser" minlength="14" maxlength="14"  placeholder="xxx.xxx.xxx-xx (Obrigatório)" autocomplete="off" onkeypress="mascara_cpf()" required>
                        <label for="cpf" class="lableInput">CPF</label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="rg" id="rg" class="inputUser" minlength="9" maxlength="9"  placeholder="x.xxx.xxx (Obrigatório)" autocomplete="off" onkeypress="mascara_rg()" required>
                        <label for="rg" class="lableInput">RG</label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="cartaoSus" id="cartaoSus" class="inputUser" minlength="18" maxlength="18" placeholder="xxx xxxx xxxx xxxx" autocomplete="off" onkeypress="mascara_sus()">
                        <label for="cartaoSus" class="lableInput">Cartão SUS</label>
                    </div>
                    <div class="inputBox">
                        <input type="text" name="complemento" id="complemento" class="inputUser" maxlength="110" placeholder="Email, Telefone..." autocomplete="off">
                        <label for="complemento" class="lableInput">Contato (complemento)</label>
                    </div>
                    <input type="submit" name="submit" id="submit" value="Enviar">
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>