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
                $tipo_hospedagem = $entradas_data['tipo_Hospedagem'];
                $hospital = $entradas_data['hospital'];
                $tipo_consulta = $entradas_data['tipo_Consulta'];
                $data_consulta = $entradas_data['data_consulta'];
                $observacoes = $entradas_data['observacoes'];
                $realizou = $entradas_data['realizou'];
                $data_entrada = $entradas_data['data_Entrada'];
                $data_saida = $entradas_data['data_Saida'];
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
    <title>CASAI | Editar Entrada</title>
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
                <!--
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" maxlength="45"  value="<?php echo $nome ?>" placeholder="" required>
                    <label for="nome" class="lableInput">Nome</label>
                </div>
                -->
                <div class="inputBox">
                    <p><b><?php echo $nome ?></b></p>
                </div>
                <div class="genderInputs">
                    <div class="genderTitle">
                        <p>Tipo De Hospedagem:</p>
                    </div>
                    <div class="tipo-hospedagem-group">
                        <div class="tipo-hospedagem-input">
                            <input id="Visitante" type="radio" name="tipo_hospedagem" value="Visitante" <?php echo $tipo_hospedagem == 'Visitante' ? 'checked' : '' ?> required>
                            <label for="Visitante">Visitante</label>
                        </div>
                        <div class="gender-input">
                            <input id="Acompanhante" type="radio" name="tipo_hospedagem" value="Acompanhante" <?php echo $tipo_hospedagem == 'Acompanhante' ? 'checked' : '' ?> required>
                            <label for="Acompanhante">Acompanhante</label>
                        </div>
                    </div>
                </div>

                <br>

                <div class="inputBox">
                    <input type="text" name="hospital" id="hospital" class="inputUser" maxlength="45" placeholder="" value="<?php echo $hospital ?>">
                    <label for="hospital" class="lableInput">Hospital</label>
                </div>

                <div class="inputBox">
                    <input type="text" name="tipo_consulta" id="tipo_consulta" class="inputUser" maxlength="20" value="<?php echo $tipo_consulta ?>">
                    <label for="tipo_consulta" class="lableInput">Tipo Da Consulta</label>
                </div>

                <div class="inputBox">
                    <label for="data_consulta">Data Da Consulta:</label>
                    <input type="datetime-local" name="data_consulta" id="data_consulta" class="inputUser" value="<?php echo $data_consulta ?>">
                </div>

                <div class="inputBox">
                    <input type="text" name="observacoes" id="observacoes" class="inputUser" placeholder="" maxlength="45" value="<?php echo $observacoes ?>">
                    <label for="observaco" class="lableInput">Observações</label>
                </div>
            
                <div class="genderInputs">
                    <div class="genderTitle">
                        <p>Realizou</p>
                    </div>
                    <div class="realizou-group">
                        <div class="realizou-input">
                            <input id="Sim" type="radio" name="realizou" value="Sim" <?php echo $realizou == 'Sim' ? 'checked' : '' ?> required>
                            <label for="Sim">Sim</label>
                        </div>
                        <div class="realizou-input">
                            <input id="Não" type="radio" name="realizou" value="Não" <?php echo $realizou == 'Não' ? 'checked' : '' ?> required>
                            <label for="Não">Não</label>
                        </div>
                        <div class="realizou-input">
                            <input id="Nulo" type="radio" name="realizou" value="" <?php echo $realizou == 'Nulo' ? 'checked' : '' ?> required>
                            <label for="Nulo">Nulo</label>
                        </div>
                    </div>
                </div>
                <br>
            
                <div class="inputBox">
                    <label for="data_entrada">Data De Entrada:</label>
                    <input type="datetime-local" name="data_entrada" id="data_entrada" class="inputUser" value="<?php echo $data_entrada ?>" required>
                </div>
                
                <div class="inputBox">
                    <label for="data_saida">Data De Saída:</label>
                    <input type="datetime-local" name="data_saida" id="data_saida" class="inputUser" value="<?php echo $data_saida ?>" required>
                </div>

                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="submit" name="update" id="update" value="Editar">

            </fieldset>
        </form>
    </div>
</body>
</html>