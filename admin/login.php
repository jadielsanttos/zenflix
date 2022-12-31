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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Login | Admin</title>
</head>
<body>

    <div class="area-login-painel">
        <div class="form-login-painel">
            <h2>Login</h2>
            <?php

                if(isset($_POST['acessar'])) {
                    $email = addslashes($_POST['email']);
                    $password = addslashes($_POST['password']);

                    if($email && $password){
                        $user->loginPainel($email, $password);
                    }else { ?>

                    <div class="alert alert-warning">
                        <span>preencha todos os campos!</span>
                    </div>
                <?php   
                    }
                }

                ?>
            <form method="post">
                <input type="email" name="email" placeholder="email" autofocus="on">
                <input type="password" name="password" placeholder="senha">
                <input type="submit" name="acessar" value="acessar">
                <a href="../index.php">Home</a>
            </form>

        </div>

        <div class="right-side">
            <a href="../index.php"><h1>Zenflix</h1></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>