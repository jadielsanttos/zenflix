<?php

session_start();

if(isset($_SESSION['login']) && !empty($_SESSION['login'])) {

}else {
    header('location: login.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin</title>
</head>
<body>

    <h2>Área exclusiva</h2>
    <a href="logout.php">sair</a>
    
</body>
</html>