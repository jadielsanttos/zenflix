<?php
require 'config.php';

if(isset($_GET['q']) && !empty($_GET['q'])) {
    $q = htmlspecialchars($_GET['q']);

    $sql = $pdo->prepare("SELECT * FROM filmes WHERE titulo LIKE '%$q%'");
    $sql->execute();
    $dado = $sql->fetchAll();
}else {
    header('location: index.php');
    exit;
} 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/busca.css">
    <title>Buscar filmes</title>
</head>
<body>

    <?php require 'partials/header.php'; ?>
    
    <div class="section-busca">
        <h1>Resultado da busca:</h1><br>
        <div class="resultado-busca">
    <?php
        if($sql->rowCount() > 0) {
        foreach($dado as $item) {  
            require 'partials/resultado_busca.php';
    ?>
        
    <?php
        }
    }else { ?>
        <h2>Nenhum resultado encontrado...</h2>
    <?php 

    }

    ?>
        </div>
    </div>


    <?php require 'partials/footer.php'; ?>

    <script>
        let area = document.querySelector('.section-busca');
        let ItemBusca = document.querySelectorAll('.resultado-busca-item');
        let footer = document.querySelector('.footer-area');
        
        if(ItemBusca.length == 0) {
            footer.style.position = 'fixed';
            footer.style.bottom = '0';
            footer.style.left = '0';
            footer.style.right = '0';
        }


    </script>

    <script src="assets/script/script.js"></script>
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
</body>
</html>