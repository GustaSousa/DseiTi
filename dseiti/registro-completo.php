<?php
    session_start();
    if((!isset($_SESSION['nome-login']) == true) and (!isset($_SESSION['senha']) == true ))
    {
        unset($_SESSION['nome-login']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    
    if(!empty($_GET['id']))
    {

        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM registros WHERE id=$id";

        $result = $conexao->query($sqlSelect); 

        if($result-> num_rows > 0)
        {
            while($registros_data = mysqli_fetch_assoc($result))
            {
                $nome = $registros_data['nome'];
                $nomeTradicional = $registros_data['nome_tradicional'];
                $sexo = $registros_data['sexo'];
                $nascimento = $registros_data['data_nascimento'];
                $indigena = $registros_data['indigena'];
                $etinia = $registros_data['etinia'];
                $aldeia = $registros_data['aldeia'];
                $cpf = $registros_data['cpf'];
                $rg = $registros_data['rg'];
                $sus = $registros_data['cartao_sus'];
                $complemento = $registros_data['complemento'];
            }
        }
        else
        {
            header('Location: historico-registros.php');
        }
            
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASAI | Registro Completo</title>
    <link rel="stylesheet" href="assets//css//style.css">
</head>
<body>
    <div class="voltar">
        <a href="historico-registros.php">Voltar</a>
    </div>

    <div class="box" in="content">
        <form action="registro.php" method="POST">
            <fieldset>
                <legend><b>Registro</b></legend>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" maxlength="45" value="<?php echo $nome ?>" placeholder="Digite O Nome Completo (Obrigatório)" required>
                    <label for="nome" class="lableInput">Nome Completo</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="nomet" id="nomet" class="inputUser" value="<?php echo $nomeTradicional ?>" maxlength="45" placeholder="Digite O Nome Tradicional (Opcional)">
                    <label for="nomet" class="lableInput">Nome Tradicional</label>
                </div>
                <div class="genderInputs">
                    <div class="genderTitle">
                        <p>Sexo:</p>
                    </div>
                    <div class="gender-group">
                        <div class="gender-input">
                            <input id="Feminino" type="radio" name="gender" value="Feminino" <?php echo $sexo == 'Feminino' ? 'checked' : '' ?> required>
                            <label for="Feminino">Feminino</label>
                        </div>
                        <div class="gender-input">
                            <input id="Masculino" type="radio" name="gender" value="Masculino" <?php echo $sexo == 'Masculino' ? 'checked' : ''?> required>
                            <label for="Masculino">Masculino</label>
                        </div>
                    </div>
                </div>

                <br>

                <div class="inputBox">
                    <label for="data_nasc">Data de Nascimento:</label>
                    <input type="date" name="data_nasc" id="data_nasc" class="inputUser" value="<?php echo $nascimento ?>" required>
                </div>
                <div class="indigenousInputs">
                    <div class="indigenousTitle">
                        <p>Indigena:</p>
                    </div>
                    <div class="indigenous-group">
                        <div class="indigenous-input">
                            <input id="yes" type="radio" name="is_indigenous" value="Sim" <?php echo $indigena == 'Sim' ? 'checked' : ''?> required>
                            <label for="yes">Sim</label>
                        </div>
                        <div class="indigenous-input">
                            <input id="no" type="radio" name="is_indigenous" value="Não" <?php echo $indigena == 'Não' ? 'checked' : ''?> required>
                            <label for="no">Não</label>
                        </div>
                    </div>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="etinia" id="etinia" class="inputUser" maxlength="30" value="<?php echo $etinia ?>">
                    <label for="nome" class="lableInput">Etinia</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="aldeia" id="aldeia" class="inputUser" maxlength="30" value="<?php echo $aldeia ?>">
                    <label for="nome" class="lableInput">Aldeia</label>
                </div>

                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" maxlength="14" placeholder="Digite O Número Do CPF (Obrigatório)" required value="<?php echo $cpf ?>">
                    <label for="nome" class="lableInput">CPF</label>
                </div>

                <div class="inputBox">
                    <input type="text" name="rg" id="rg" class="inputUser" maxlength="14" placeholder="Digite O Número Do CPF (Obrigatório)" required value="<?php echo $rg ?>">
                    <label for="nome" class="lableInput">RG</label>
                </div>

                <div class="inputBox">
                    <input type="text" name="cartaoSus" id="cartaoSus" class="inputUser" maxlength="18" placeholder="Digite O Número Do Carão SUS (Opcional)" value="<?php echo $sus ?>">
                    <label for="cartaoSus" class="lableInput">Cartão SUS</label>
                </div>

                <div class="inputBox">
                    <input type="text" name="complemento" id="complemento" class="inputUser" maxlength="110" placeholder="Email, Telefone... (Opcional)" value="<?php echo $complemento ?>">
                    <label for="complemento" class="lableInput">Contato (complemento)</label>
                </div>
<!--
                <div class="submit" id="subimit">
                    <a href="historico-registros.php">Historico</a>
                </div>
-->
            </fieldset>
        </form>
    </div>
</body>
</html>