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

        $sqlSelect = "SELECT * FROM entradas WHERE identradas=$id";

        $result = $conexao->query($sqlSelect); 

        if($result-> num_rows > 0)
        {
            while($entradas_data = mysqli_fetch_assoc($result))
            {
                $nome = $entradas_data['nome'];
                $id_pc = $entradas_data['id_pc'];
                $local_origem = $entradas_data['local_origem'];
                $local_destino = $entradas_data['local_destino'];
                $motorista = $entradas_data['motorista'];
                $data_saida = $entradas_data['data_saida'];
                $complemento = $entradas_data['complemento'];
            }
        }
        else
        {
            header('Location: historico-entradas.php');
        }
            
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada Completa</title>
    <link rel="stylesheet" href="assets//css/style.css">
</head>
<body>
    <div class="voltar">
        <a href="historico-entradas.php">Voltar</a>
    </div>

    <div class="box">
        <form action="entrada-edicao.php" method="POST">
            <fieldset>
                <legend><b>Entrada e Saída</b></legend>
                <div class="inputBox">
                    <p><b>Nome:</b> <?php echo $nome ?></p>
                </div>

                <div class="inputBox">
                    <p><b>ID:</b> <?php echo $id_pc ?></p>
                </div>                
                
                <div class="inputBox">
                    <input type="text" name="local_origem" id="local_origem" class="inputUser" maxlength="45" placeholder="" list="polos" autocomplete="off" value="<?php echo $local_origem?>" required>
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
                    <input type="text" name="local_destino" id="local_destino" class="inputUser" maxlength="45" placeholder="" valeu="<?php echo $local_destino?>" list="polos" autocomplete="off">
                    <label for="local_destino" class="lableInput">Local de Destino</label>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="motorista" id="motorista" class="inputUser" maxlength="45" placeholder="" value="<?php echo $motorista?>">
                    <label for="motorista" class="lableInput">Motorista</label>
                </div>
                
                <div class="inputBox">
                    <label for="data_saida">Data De Saída:</label>
                    <input type="datetime-local" name="data_saida" id="data_saida" class="inputUser" value="<?php echo $data_saida?>" required>
                </div>
                
                <div class="inputBox">
                    <input type="text" name="complemento" id="complemento" class="inputUser" maxlength="90" placeholder="" autocomplete="off" value="<?php echo $complemento?>"> 
                    <label for="nome" class="lableInput">Complemento</label>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>