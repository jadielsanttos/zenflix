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
    <title>Login - Painel</title>
</head>
<body>

    <div class="area-login-painel">
        <h2>Login</h2>
        <div class="form-painel">
            <form method="post">
                <input type="email" name="email" placeholder="email">
                <input type="password" name="password" placeholder="senha">
                <input type="submit" name="acessar" value="acessar">
            </form>
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