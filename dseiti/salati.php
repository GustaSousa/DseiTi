<?php
 session_start();
 include('config.php');
 if((!isset($_SESSION['nome-login']) == true) and (!isset($_SESSION['senha']) == true )){
     unset($_SESSION['nome-login']);
     unset($_SESSION['senha']);
     header('Location: login.php');
    }

$sql = "SELECT * FROM registros WHERE local_atual='Dsei TI' ORDER BY id ASC";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sala TI</title>
    <link rel="stylesheet" href="assets/css/cozinha.css">
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
    
    <div id="cozinha">
        <table>
            
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Patrimônio</th>
                    <th scope="col">Tombamento</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>

            <tbody>     
                <?php 
                    while($entradas_data = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$entradas_data['id']."</td>";
                        echo "<td>".$entradas_data['nome']."</td>";
                        echo "<td>".$entradas_data['patrimonio']."</td>";
                        echo "<td>".$entradas_data['tombamento']."</td>";
                        echo "<td>".$entradas_data['descricao']."</td>";
                        echo "<td>".$entradas_data['status']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>

        </table>
    </div>

</body>
</html>