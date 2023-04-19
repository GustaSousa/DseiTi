<?php
 session_start();
 include('config.php');
 if((!isset($_SESSION['nome-login']) == true) and (!isset($_SESSION['senha']) == true )){
     unset($_SESSION['nome-login']);
     unset($_SESSION['senha']);
     header('Location: login.php');
 }

$ano = date('Y');
$DEZ = $ano.'/12/01';
$DEZF = $ano.'/12/31';

$sql = "SELECT * FROM casaidb.entradas WHERE data_Entrada >= '$DEZ' AND data_Entrada <= '$DEZF' ORDER BY data_Entrada ASC";
$result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CASAI | Historico de Entradas</title>
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
        <a href="historico-entradas.php">TODOS</a>
        <a href="historico-entradas-janeiro.php">JAN</a>
        <a href="historico-entradas-fevereiro.php">FEV</a>
        <a href="historico-entradas-marco.php">MAR</a>
        <a href="historico-entradas-abril.php">ABR</a>
        <a href="historico-entradas-maio.php">MAI</a>
        <a href="historico-entradas-junho.php">JUN</a>
        <a href="historico-entradas-julho.php">JUL</a>
        <a href="historico-entradas-agosto.php">AGO</a>
        <a href="historico-entradas-setembro.php">SET</a>
        <a href="historico-entradas-outubro.php">OUT</a>
        <a href="historico-entradas-novembro.php">NOV</a>
        <a href="historico-entradas-dezembro.php">DEZ</a>
    </div>

    <br>

    <div class="tabela-historico">
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Etinia</th>
                <th scope="col">Tipo de Hospedagem</th>
                <th scope="col">Hospital</th>
                <th scope="col">Tipo da Consulta</th>
                <th scope="col">Data da Consulta</th>
                <th scope="col">Realizou?</th>
                <th scope="col">Observações</th>
                <th scope="col">Data de Entrada</th>
                <th scope="col">Data de Saida</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                while($entradas_data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$entradas_data['identradas']."</td>";
                    echo "<td>".$entradas_data['nome']."</td>";
                    echo "<td>".$entradas_data['etinia']."</td>";
                    echo "<td>".$entradas_data['tipo_Hospedagem']."</td>";
                    echo "<td>".$entradas_data['hospital']."</td>";
                    echo "<td>".$entradas_data['tipo_Consulta']."</td>";
                    echo "<td>".$entradas_data['data_consulta']."</td>";
                    echo "<td>".$entradas_data['realizou']."</td>";
                    echo "<td>".$entradas_data['observacoes']."</td>";
                    echo "<td>".$entradas_data['data_Entrada']."</td>";
                    echo "<td>".$entradas_data['data_Saida']."</td>";
                    echo "<td>
                            <a href='entrada-completo.php?id=$entradas_data[identradas]' >
                            <img src='assets//img//svg//file-invoice.svg' alt='Icone de uma ficha'>
                            </a>
                        </td>";
                    echo "<td>
                            <a href='entrada-editar.php?id=$entradas_data[identradas]' >
                            <img src='assets//img//svg//edit(1).svg' alt='Icone de um lapis'>
                            </a>
                        </td>";
                    echo "<td>
                            <a href='entrada-excluir.php?id=$entradas_data[identradas]' >
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
        window.location = 'historico-entradas.php?search='+search.value;
    }
</script>
</html>