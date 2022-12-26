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
            <?php 
            
            $sql = $pdo->prepare("SELECT * FROM filmes");
            $sql->execute();

            $info = $sql->fetchAll();

            $n = rand(0, count($info) - 1);

            foreach($info as $key => $i) {
                if($n === $key) { ?>
                <img src="<?=$i['dir_foto'];?>">
                <div class="section-banner-info">
                    <div class="section-banner-info--title"><h2><?=$i['titulo'];?></h2></div>
                    <div class="section-banner-info--descricao"><p><?=$i['descricao'];?></p></div>
                    <div class="section-banner-info--avaliacao">
                        <span class="span-right"><?=number_format($i['media'], 1);?> <i class="fa-solid fa-star"></i></span>
                    </div>
                    <a href="filme.php?f=<?=$i['titulo'];?>">Detalhes</a>
                </div>

            <?php  
                }

            }//endforeach

            
            ?>
    


            <div class="shadow-horizontal"></div>
            <div class="shadow-vertical"></div>
        </div>
    </div>


    <div class="main">
        <div class="title-main"><h2>Adicionados recentemente</h2></div>

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
                            <span><?=number_format($filme['media'], 1);?> <i class="fa-solid fa-star"></i></span>
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
                            <span><?=number_format($item['media'], 1);?> <i class="fa-solid fa-star"></i></span>
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


    <script src="assets/script/script.js"></script>
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
</body>
</html>