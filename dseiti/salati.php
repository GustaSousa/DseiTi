<?php
 session_start();
 include('config.php');
 if((!isset($_SESSION['nome-login']) == true) and (!isset($_SESSION['senha']) == true )){
     unset($_SESSION['nome-login']);
     unset($_SESSION['senha']);
     header('Location: login.php');
    }
    
$hoje = date('Y/m/d');
$hoje_dois = date('d/m/Y');
$sql = "SELECT * FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' ORDER BY nome ASC";
$result = $conexao->query($sql);

$sqlTodos = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje'";
$resultTodos = $conexao->query($sqlTodos);
$sqlAtikum = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Atikum'";
$resultAtikum = $conexao->query($sqlAtikum);
$sqlAtikumSalgueiro = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Atikum Salgueiro'";
$resultAtikumSalgueiro = $conexao->query($sqlAtikumSalgueiro);
$sqlFunilo = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Funil-Ô'";
$resultFunilo = $conexao->query($sqlFunilo);
$sqlKambiwa = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Kambiwá'";
$resultKambiwa = $conexao->query($sqlKambiwa);
$sqlKapinawa = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Kapinawá'";
$resultKapinawa = $conexao->query($sqlKapinawa);
$sqlPankara = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Pankará'";
$resultPankara = $conexao->query($sqlPankara);
$sqlPankararu = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Pankararu'";
$resultPankararu = $conexao->query($sqlPankararu);
$sqlPankararuEntreSerras = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Pankararu Entre Serras'";
$resultPankararuEntreSerras = $conexao->query($sqlPankararuEntreSerras);
$sqlPipipa = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Pipipã'";
$resultPipipa = $conexao->query($sqlPipipa);
$sqlTruka = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Truká'";
$resultTruka = $conexao->query($sqlTruka);
$sqlTrukaOroco = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Truká Orocó'";
$resultTrukaOroko = $conexao->query($sqlTrukaOroco);
$sqlTuxa = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Tuxá'";
$resultTuxa = $conexao->query($sqlTuxa);
$sqlTuxi = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Tuxí'";
$resultTuxi= $conexao->query($sqlTuxi);
$sqlXukuruDeCimbres = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Xukuru de Cimbres'";
$resultXukuruDeCimbres = $conexao->query($sqlXukuruDeCimbres);
$sqlXukuruDeOroruba = "SELECT etinia FROM entradas WHERE data_Entrada <= '$hoje' AND data_Saida >= '$hoje' AND etinia='Xukuru de Ororubá'";
$resultXukuruDeOroruba = $conexao->query($sqlXukuruDeOroruba);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sala TI</title>
    <link rel="stylesheet" href="assets//css//cozinha.css">
    <style>
        table{
            border-collapse: collapse;
        }
      
        td, tr, th{
            border: 1px solid white; 
            padding: 10px;
        }

    </style>
</head>
<body>
    <div class="voltar">
        <a href="home.php">Voltar</a>
    </div>

    <br>
    
    <div class="box-data">
        <h2><?php echo $hoje; ?></h2>
    </div>
    
    <br>
    
    <div class="box-info">
        <p>Todos: <?php echo mysqli_num_rows($resultTodos)?></p>
        <p>Atikum: <?php echo mysqli_num_rows($resultAtikum)?></p>
        <p>Atikum Salgueiro: <?php echo mysqli_num_rows($resultAtikumSalgueiro)?></p>
        <p>Funil-Ô: <?php echo mysqli_num_rows($resultFunilo)?></p>
        <p>Kambiwá: <?php echo mysqli_num_rows($resultKambiwa)?></p>
        <p>Kapinawá: <?php echo mysqli_num_rows($resultKapinawa)?></p>
        <p>Pankará: <?php echo mysqli_num_rows($resultPankara)?></p>
        <p>Pankararu: <?php echo mysqli_num_rows($resultPankararu)?></p>
        <p>Pankararu Entre Serras: <?php echo mysqli_num_rows($resultPankararuEntreSerras)?></p>
        <p>Pipipã: <?php echo mysqli_num_rows($resultPipipa)?></p>
        <p>Truká: <?php echo mysqli_num_rows($resultTruka)?></p>
        <p>Truká Orocó: <?php echo mysqli_num_rows($resultTrukaOroko)?></p>
        <p>Tuxá: <?php echo mysqli_num_rows($resultTuxa)?></p>
        <p>Tuxí: <?php echo mysqli_num_rows($resultTuxi)?></p>
        <p>Xukuru de Cimbres: <?php echo mysqli_num_rows($resultXukuruDeCimbres)?></p>
        <p>Xukuru de Ororubá: <?php echo mysqli_num_rows($resultXukuruDeOroruba)?></p>
    </div>

    <div id="cozinha">
        <table>
            
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Tipo de Hospedagem</th>
                    <th scope="col">data de Entrada</th>
                    <th scope="col">data de Saida</th>
                    <th scope="col">Observações</th>
                </tr>
            </thead>

            <tbody>     
                <?php 
                    while($entradas_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$entradas_data['identradas']."</td>";
                        echo "<td>".$entradas_data['nome']."</td>";
                        echo "<td>".$entradas_data['tipo_Hospedagem']."</td>";
                        echo "<td>".$entradas_data['data_Entrada']."</td>";
                        echo "<td>".$entradas_data['data_Saida']."</td>";
                        echo "<td>".$entradas_data['observacoes']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>

        </table>
    </div>

</body>
</html>