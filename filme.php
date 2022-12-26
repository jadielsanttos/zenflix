<?php require 'config.php'; 


$data = [];
$filme = filter_input(INPUT_GET, 'f');


if($filme) {
    $sql = $pdo->prepare("SELECT * FROM filmes where titulo = :titulo");
    $sql->bindValue(':titulo', $filme);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $data = $sql->fetch(PDO::FETCH_ASSOC);
    }

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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Zenflix</title>
</head>
<body>

    <?php require 'partials/header.php'; ?>


    <section class="section-view-filme" style="width: 100%; height: 100vh; background-image: url('<?=$data['dir_foto'];?>'); background-repeat: no-repeat; background-size: cover;">
        <div class="single">
            <div class="area-section-view-filme">
                <h1><?=$data['titulo'];?></h1>
                <p><?=$data['descricao'];?></p>
                <span>avaliação</span>
                <div class="link-avaliacao">
                    <a href="voto.php?id=<?=$data['id'];?>&voto=1"><i class="fa-solid fa-star"></i></a>
                    <a href="voto.php?id=<?=$data['id'];?>&voto=2"><i class="fa-solid fa-star"></i></a>
                    <a href="voto.php?id=<?=$data['id'];?>&voto=3"><i class="fa-solid fa-star"></i></a>
                    <a href="voto.php?id=<?=$data['id'];?>&voto=4"><i class="fa-solid fa-star"></i></a>
                    <a href="voto.php?id=<?=$data['id'];?>&voto=5"><i class="fa-solid fa-star"></i></a>
                    <span>(<?=number_format($data['media'], 1);?>)</span>
                </div>
                <button>assistir</button>
            </div>
        </div>
    </section>

    <?php require 'partials/footer.php'; ?>
    
    <script src="assets/script/script.js"></script>
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
</body>
</html>
