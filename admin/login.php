<?php 
require 'classes/Usuarios.php';
require '../config.php';

$user = new Usuarios();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Login - Painel</title>
</head>
<body>

    <div class="area-login-painel">
        <div class="form-login-painel">
            <h2>Login</h2>
            <form method="post">
                <input type="email" name="email" placeholder="email" autofocus="on" required>
                <input type="password" name="password" placeholder="senha" required>
                <input type="submit" name="acessar" value="acessar">
                <a href="../index.php">Home</a>
            </form>

        </div>

        <div class="right-side">

        </div>
    </div>


    <?php

        if(isset($_POST['acessar'])) {
            $email = addslashes($_POST['email']);
            $password = addslashes($_POST['password']);

            $user->loginPainel($email, $password);

        }

    ?>
    
</body>
</html>