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
                $patrimonio = $registros_data['patrimonio'];
                $tombamento = $registros_data['tombamento'];
                $descricao = $registros_data['descricao'];
                $status = $registros_data['status'];
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
    <title>Editar Registro</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="voltar">
        <a href="historico-registros.php">Voltar</a>
    </div>

    <div class="box" in="content">
        <form action="registro-edicao.php" method="POST">
            <fieldset>
                <legend><b>Registro</b></legend>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" maxlength="45" value="<?php echo $nome ?>" placeholder="Digite O Nome Completo (Obrigatório)" required>
                    <label for="nome" class="lableInput">Nome </label>
                </div>
                <div class="inputBox">
                    <input type="text" name="patrimonio" id="patrimonio" class="inputUser" value="<?php echo $patrimonio ?>" maxlength="45" placeholder="">
                    <label for="patrimonio" class="lableInput">Patrimonio</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="tombamento" id="tombamento" class="inputUser" value="<?php echo $tombamento ?>" maxlength="45" placeholder="">
                    <label for="tombamento" class="lableInput">Tombamento</label>
                </div>
                <div class="statusInputs">
                    <div class="statusTitle">
                        <p>Status:</p>
                    </div>
                    <div class="status-group">
                        <div class="status-input">
                            <input id="Funcionando" type="radio" name="status" value="Funcionando" <?php echo $status == 'Funcionando' ? 'checked' : '' ?> required>
                            <label for="Funcionando">Funcionando</label>
                        </div>
                        <div class="status-input">
                            <input id="Parado" type="radio" name="status" value="Parado" <?php echo $status == 'Parado' ? 'checked' : ''?> required>
                            <label for="Parado">Parado</label>
                        </div>
                    </div>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="descricao" id="descricao" class="inputUser" value="<?php echo $descricao ?>" maxlength="45" placeholder="">
                    <label for="descricao" class="lableInput">Descrição</label>
                </div>

                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="hidden" name="nome_antigo" value="<?php echo $nome?>">

                <input type="submit" name="update" id="update" value="Editar">
            </fieldset>
        </form>
    </div>
</body>
</html>