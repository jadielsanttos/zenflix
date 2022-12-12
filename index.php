<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Filmes & séries</title>
</head>
<body>

    <div class="main">
        <h1>Lista de filmes & séries</h1>

        <div class="listagem">

        <?php 

        $sql = $pdo->prepare("SELECT * FROM filmes");
        $sql->execute();

        if($sql->rowCount() > 0) { 
            foreach($sql->fetchAll() as $filme) {  ?>
                <div class="item-listagem">
                    <h3><?=$filme['titulo'];?></h3>
                    <a href="voto.php?id=<?=$filme['id'];?>&voto=1"><i class="fa-solid fa-star"></i></a>
                    <a href="voto.php?id=<?=$filme['id'];?>&voto=2"><i class="fa-solid fa-star"></i></a>
                    <a href="voto.php?id=<?=$filme['id'];?>&voto=3"><i class="fa-solid fa-star"></i></a>
                    <a href="voto.php?id=<?=$filme['id'];?>&voto=4"><i class="fa-solid fa-star"></i></a>
                    <a href="voto.php?id=<?=$filme['id'];?>&voto=5"><i class="fa-solid fa-star"></i></a>
                    <span>(<?=number_format($filme['media'], 2);?>)</span>
                </div>
        <?php
            }
        }else {
            echo 'Não há filmes cadastrados...';
        }

        ?>
            
        </div>
    </div>
    
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
</body>
</html>