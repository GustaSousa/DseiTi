<?php
 session_start();
 include('config.php');
 if((!isset($_SESSION['nome-login']) == true) and (!isset($_SESSION['senha']) == true )){
     unset($_SESSION['nome-login']);
     unset($_SESSION['senha']);
     header('Location: login.php');
 }

 if(!empty($_GET['search'])){
    $data = $_GET['search'];
    $sql = "SELECT * FROM registros WHERE id LIKE '%$data%' or nome LIKE '%$data%' or patrimonio LIKE '%$data%' or tombamento LIKE '%$data%' or status LIKE '%$data%' or descricao LIKE '%$data% ORDER BY id DESC";
}
else{
    $sql = "SELECT * FROM registros ORDER BY id DESC";
}

 $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico de Registros</title>
    <link rel="stylesheet" href="assets//css//historico-tabelas-registro.css">
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
            <img src="assets/img/svg/search.svg" alt="Icone de uma lupa">
        </button>
    </div>

    <br>

    <div class="tabela-historico">
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Patrimonio</th>
                <th scope="col">Tombamento</th>
                <th scope="col">Status</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
                while($registros_data = mysqli_fetch_assoc($result))
                {
                    echo "<tr>";
                    echo "<td>".$registros_data['id']."</td>";
                    echo "<td>".$registros_data['nome']."</td>";
                    echo "<td>".$registros_data['patrimonio']."</td>";
                    echo "<td>".$registros_data['tombamento']."</td>";
                    echo "<td>".$registros_data['status']."</td>";
                    echo "<td>".$registros_data['descricao']."</td>";
                    echo "<td>
                            <a href='registro-completo.php?id=$registros_data[id]' >
                            <img src='assets/img/svg/file-invoice.svg' alt='Icone de uma ficha'>
                            </a>
                        </td>";
                    echo "<td>
                            <a href='registro-editar.php?id=$registros_data[id]' >
                            <img src='assets/img/svg/edit(1).svg' alt='Icone de um lapis'>
                            </a>
                        </td>";
                    echo "<td>
                            <a href='registro-excluir.php?id=$registros_data[id]'>
                            <img src='assets/img/svg/trash2.svg' alt='Icone de um lapis'>
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
        window.location = 'historico-registros.php?search='+search.value;
    }
</script>
</html>