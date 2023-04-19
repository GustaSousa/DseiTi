<?php
 session_start();
 include('config.php');
 if((!isset($_SESSION['nome-login']) == true) and (!isset($_SESSION['senha']) == true )){
     unset($_SESSION['nome-login']);
     unset($_SESSION['senha']);
     header('Location: login.php');
 }

$ano = date('Y');
$ABR = $ano.'/04/01';
$ABRF = $ano.'/04/31';

$sql = "SELECT * FROM casaidb.agendamentos WHERE data_consulta >= '$ABR' AND data_consulta <= '$ABRF' ORDER BY data_consulta ASC";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CASAI | Historico de Agendamentos</title>
    <link rel="stylesheet" href="assets//css//historico-tabelas-entrada.css">
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
        <a href="historico.php">Voltar</a>
    </div>
    
    <br>
    
    <div class="box-search">
        <input type="text" placeholder="Pesquisar" id="Pesquisar">
        <button class="btn-search" onclick="searchData()">
            <img src="assets//img//svg//search.svg" alt="Icone de uma lupa">
        </button>
    </div>
    
    <div class="box-mounth">
        <a href="historico-agendamentos.php">TODOS</a>
        <a href="historico-agendamentos-janeiro.php">JAN</a>
        <a href="historico-agendamentos-fevereiro.php">FEV</a>
        <a href="historico-agendamentos-marco.php">MAR</a>
        <a href="historico-agendamentos-abril.php">ABR</a>
        <a href="historico-agendamentos-maio.php">MAI</a>
        <a href="historico-agendamentos-junho.php">JUN</a>
        <a href="historico-agendamentos-julho.php">JUL</a>
        <a href="historico-agendamentos-agosto.php">AGO</a>
        <a href="historico-agendamentos-setembro.php">SET</a>
        <a href="historico-agendamentos-outubro.php">OUT</a>
        <a href="historico-agendamentos-novembro.php">NOV</a>
        <a href="historico-agendamentos-dezembro.php">DEZ</a>
    </div>

    <br>

    <div class="tabela-historico">
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Etinia</th>
                <th scope="col">Hospital</th>
                <th scope="col">Tipo da Consulta</th>
                <th scope="col">Data da Consulta</th>
                <th scope="col">Realizou?</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                while($entradas_data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$entradas_data['idagendamentos']."</td>";
                    echo "<td>".$entradas_data['nome']."</td>";
                    echo "<td>".$entradas_data['etinia']."</td>";
                    echo "<td>".$entradas_data['hospital']."</td>";
                    echo "<td>".$entradas_data['tipo_consulta']."</td>";
                    echo "<td>".$entradas_data['data_consulta']."</td>";
                    echo "<td>".$entradas_data['realizou']."</td>";
                    echo "<td>
                            <a href='agendamento-editar.php?id=$entradas_data[idagendamentos]' >
                            <img src='assets//img//svg//edit(1).svg' alt='Icone de um lapis'>
                            </a>
                        </td>";
                    echo "<td>
                            <a href='agendamento-excluir.php?id=$entradas_data[idagendamentos]' >
                            <img src='assets//img//svg//trash2.svg' alt='Icone de um lapis'>
                            </a>
                        </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
        </table>
    </div>
</body>
<script>
    var search = document.getElementById('Pesquisar');
    
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") { 
            searchData();
        }
    }); 
    
    function searchData(){
        window.location = 'historico-agendamentos.php?search='+search.value;
    }
</script>
</html>