<?php require 'config.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Zenflix</title>
</head>
<body>

    <?php require 'partials/header.php'; ?>

    <div class="section-banner">
        <div class="section-item">
            <img src="assets/images/batman.jpg" alt="">
        </div>
    </div>

    <div class="main">
        <h2>Adicionados recentemente</h2>

        <div class="listagem">

        <?php 

        $sql = $pdo->prepare("SELECT * FROM filmes");
        $sql->execute();

        if($sql->rowCount() > 0) { 
            foreach($sql->fetchAll() as $filme) {  ?>
                <a class="link-item-listagem" href="filme.php?f=<?=$filme['titulo'];?>">
                    <div class="item-listagem">
                        <img src="<?=$filme['dir_foto'];?>" alt="">
                        <div class="area-info">
                            <h3><?=$filme['titulo'];?></h3>
                            <p><?=$filme['descricao'];?></p>
                            <a href="voto.php?id=<?=$filme['id'];?>&voto=1"><i class="fa-solid fa-star"></i></a>
                            <a href="voto.php?id=<?=$filme['id'];?>&voto=2"><i class="fa-solid fa-star"></i></a>
                            <a href="voto.php?id=<?=$filme['id'];?>&voto=3"><i class="fa-solid fa-star"></i></a>
                            <a href="voto.php?id=<?=$filme['id'];?>&voto=4"><i class="fa-solid fa-star"></i></a>
                            <a href="voto.php?id=<?=$filme['id'];?>&voto=5"><i class="fa-solid fa-star"></i></a>
                            <span>(<?=number_format($filme['media'], 2);?>)</span>
                        </div>
                    </div>
                </a>
        <?php
            }
        }else {
            echo 'Não há filmes cadastrados...';
        }

        ?>
            
        </div>
    </div>

    <div class="section-single">
        <div class="title-section-single"><h2>Melhores avaliações</h2></div>
        <div class="listagem">

        <?php 
        
        $sql = $pdo->prepare("SELECT * FROM filmes WHERE media > 3");
        $sql->execute();

        if($sql->rowCount() > 0) {
            foreach($sql->fetchAll() as $item) { ?>
                <a class="link-item-listagem" href="filme.php?f=<?=$item['titulo'];?>">
                    <div class="item-listagem">
                        <img src="<?=$item['dir_foto'];?>" alt="">
                        <div class="area-info">
                            <h3><?=$item['titulo'];?></h3>
                            <p><?=$item['descricao'];?></p>
                            <a href="voto.php?id=<?=$item['id'];?>&voto=1"><i class="fa-solid fa-star"></i></a>
                            <a href="voto.php?id=<?=$item['id'];?>&voto=2"><i class="fa-solid fa-star"></i></a>
                            <a href="voto.php?id=<?=$item['id'];?>&voto=3"><i class="fa-solid fa-star"></i></a>
                            <a href="voto.php?id=<?=$item['id'];?>&voto=4"><i class="fa-solid fa-star"></i></a>
                            <a href="voto.php?id=<?=$item['id'];?>&voto=5"><i class="fa-solid fa-star"></i></a>
                            <span>(<?=number_format($item['media'], 2);?>)</span>
                        </div>
                    </div>
                </a>

        <?php    
            }
        }
        
        ?>
        </div>
    </div>

    <div style="height: 50px"></div>

    <?php require 'partials/footer.php'; ?>
    
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
</body>
</html>