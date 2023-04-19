<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASAI | Login</title>
    <link rel="stylesheet" href="assets//css//login.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form action="testeLogin.php" method="POST">    
            <input type="text" class="inputLogin" name="nome-login" placeholder="Nome" autocomplete="off">
            <br>
            <input type="password" class="inputLogin" name="senha" placeholder="Senha">
            <br>
            <input type="submit" name="submit" value="Entrar" class="loginButton">
        </form>
    </div>
</body>
</html>