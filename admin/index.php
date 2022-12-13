<?php
//session_start();
require_once 'classes/Usuarios.php';
require_once 'classes/Filmes.php';
$filmes = new Filmes(); 

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
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Painel Admin</title>
</head>
<body>

    <section class="main">
        <div class="side-bar">
            <h2>Zenflix</h2>
            <a href="../index.php">acessar site</a>
            <a href="logout.php">sair</a>
        </div>


        <div class="content">
            <div class="form">
                <h1>Cadastrar novo filme</h1>
                <form action="" method="post">
                    <label for="Nome do filme">Nome</label>
                    <input type="text" name="titulo" placeholder="Nome do filme">
                    
                    <label for="Descrição">Descrição</label>
                    <textarea name="descricao" id="" cols="30" rows="10" placeholder="Descrição do filme..."></textarea>
                
                    <input type="submit" name="cadastrar" value="cadastrar">
                </form>
            </div>
        </div>
    </section>



    <?php 

        if(isset($_POST['cadastrar'])) {
            $titulo = addslashes($_POST['titulo']);
            $descricao = addslashes($_POST['descricao']);

            $filmes->cadastrarFilmes($titulo,$descricao);
        }

    ?>

    
</body>
</html>