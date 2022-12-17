<?php
require_once 'classes/Usuarios.php';
require_once 'classes/Filmes.php';
$filmes = new Filmes(); 

// verificando sessao
if(isset($_SESSION['login']) && !empty($_SESSION['login'])) {

}else {
    header('location: login.php');
    exit;
}

// puxando dados do filme
$data = [];
$id_filme = filter_input(INPUT_GET, 'id');

if($id_filme) {
    $sql = $pdo->prepare("SELECT * FROM filmes WHERE id = :id_filme");
    $sql->bindValue(':id_filme', $id_filme);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $data = $sql->fetch(PDO::FETCH_ASSOC);
    }
}else {
    header('location: editar.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Painel Admin</title>
</head>
<body>

    <section class="main">
        <div class="side-bar">
        <a href="index.php"><h2>Zenflix</h2></a>
            <a href="../index.php">acessar site</a>
            <a href="logout.php">sair</a>
        </div>


        <div class="content">
            <div class="title-edit"><h2>Editar filmes <i id="angle-up" class="fa-solid fa-angle-up"></i><i id="angle-down" class="fa-solid fa-angle-down"></i></h2></div>
            <div class="form">
                <form method="post" enctype="multipart/form-data">
                    <h4>Capa do filme</h4>
                    <img src="../<?=$data['dir_foto'];?>" class="show-capa"><br>

                    <input type="hidden" name="id" value="<?=$data['id'];?>">
                    <label for="Nome do filme">Nome</label>
                    <input type="text" name="titulo" placeholder="Nome do filme" value="<?=$data['titulo'];?>">
                    
                    <label for="Descrição">Descrição</label>
                    <textarea name="descricao" id="" cols="30" rows="10" placeholder="Descrição do filme..."><?=$data['descricao'];?></textarea>
                    
                    <label for="Media">Media</label>
                    <input type="text" name="media" value="<?=$data['media'];?>">

                    <label for="AlterarCapa">Alterar capa</label>
                    <input type="file" name="AlterarCapa">
                    <input type="submit" name="salvar" value="salvar">
                </form>

            </div>

        </div>
    </section>


    <?php 

        if(isset($_POST['salvar'])) {
            $titulo = addslashes($_POST['titulo']);
            $descricao = addslashes($_POST['descricao']);
            $media = addslashes($_POST['media']);

            $filmes->editarFilmes($titulo,$descricao,$media);
        }
        

    ?>

    <script>

        document.querySelector('.title-edit').addEventListener('click', showForm);

        function showForm() {
            let angle_up = document.getElementById('angle-up');
            let angle_down = document.getElementById('angle-down');
            let form = document.querySelector('.form');

            if(form.style.display == 'block') {
                angle_up.style.display = 'none';
                angle_down.style.display = 'block';
                form.style.display = 'none';
            }else {
                angle_up.style.display = 'block';
                angle_down.style.display = 'none';
                form.style.display = 'block';
            }
        }

    </script>



    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>