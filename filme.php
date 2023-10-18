<?php require 'config.php'; 

$data = [];
$filme = base64_decode(filter_input(INPUT_GET, 'f'));


if($filme) {
    $sql = $pdo->prepare("SELECT * FROM filmes where titulo = :titulo");
    $sql->bindValue(':titulo', $filme);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $data = $sql->fetch(PDO::FETCH_ASSOC);
    }else {
        header('location: index.php');
        exit;
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
    <div class="preload">
        <div class="area-load">
            <div class="load"></div>
        </div>
    </div>

    <?php require 'partials/header.php'; ?>

    <section class="section-view-filme" style="width: 100%; height: 100vh; background-image: url('<?=$data['dir_foto'];?>'); background-repeat: no-repeat; background-size: cover;">
        <div class="single">
            <div class="area-shadow">
                <div class="area-section-view-filme">
                    <h1><?=$data['titulo'];?></h1>
                    <p><?=$data['descricao'];?></p>
                    <span>Avaliação</span>
                    <div class="rate-movie">
                        <span><i class="fa-solid fa-star"></i></span>
                        <span>(<?=number_format($data['media'], 1);?>)</span>
                    </div>
                    <div class="area-btns">
                        <button class="btn-open-modal-trailer" onclick="openModal()">Trailer</button>
                        <button class="btn-open-modal-rate-movie" onclick="openModalRateMovie()">Avaliar</button>
                    </div>
                </div>
                <div class="fade"></div>
                <div class="area-trailer">
                    <button class="btn-close-modal-trailer" onclick="closeModal()">Fechar</button>
                    <iframe width="600" height="400" src="<?=$data['url_trailer'];?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="shadow-rate-movie">
            <div class="modal-rate-movie">
                <div class="title">
                    <h1>Avaliar filme</h1>
                </div>
                <div class="area-avaliacao">
                    <div class="label">Sua avaliação é muito importante</div>
                    <div class="stars">
                        <span class="item-star" data-id="1"><i class="fa-solid fa-star"></i></span>
                        <span class="item-star" data-id="2"><i class="fa-solid fa-star"></i></span>
                        <span class="item-star" data-id="3"><i class="fa-solid fa-star"></i></span>
                        <span class="item-star" data-id="4"><i class="fa-solid fa-star"></i></span>
                        <span class="item-star" data-id="5"><i class="fa-solid fa-star"></i></span>
                    </div>
                    <div class="area-btn-send">
                        <button>Enviar</button>
                    </div>
                    <div class="area-btn-close-modal">
                        <button onclick="closeModalRateMovie()">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require 'partials/footer.php'; ?>
    
    <script>
        document.querySelector('.preload').style.display = 'block';
        setTimeout(() => {
            document.querySelector('.preload').style.display = 'none';
        }, 2000);

        const itemsOfVote = document.querySelectorAll('.stars span');
        const btnSendVote = document.querySelector('.area-btn-send button');

        itemsOfVote.forEach((item, index) => {
            item.addEventListener('click', () => {
                let className = 'chosen-star';

                // Verifica o item clicado
                itemsOfVote.forEach((item, index2) => {
                    index >= index2 ? item.classList.add(className) : item.classList.remove(className);
                });

                // Envia a avaliação
                btnSendVote.addEventListener('click', () => {
                    const itemsChosen = document.querySelectorAll('.chosen-star');
                    const urlRequest = `voto.php?id=<?=$data['id']?>&voto=${itemsChosen.length}`;

                    window.location = urlRequest;
                });
            });
        });

    </script>
    <script src="assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
</body>
</html>
