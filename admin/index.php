<?php
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Painel Admin</title>
</head>
<body>

    <section class="main">
        <div class="side-bar">
            <div class="close-menu-btn"><i class="fa-solid fa-xmark"></i></div>
            <a href=""><h2>Zenflix</h2></a>
            <a href="../index.php">acessar site</a>
            <a href="logout.php">sair</a>
        </div>
        

        <div class="content">
            <div id="menu" class="menu">
                <i class="fa-solid fa-bars" id="handleMenu"></i>
            </div>
            <div class="title-form"><h2>Cadastrar novo filme <i id="angle-up1" class="fa-solid fa-angle-up"></i><i id="angle-down1" class="fa-solid fa-angle-down"></i></h2></div>
            <div class="form">
                <?php 
                    if(isset($_POST['cadastrar'])) {
                        $titulo = addslashes($_POST['titulo']);
                        $descricao = addslashes($_POST['descricao']);
                        
                        $nome_arquivo = $_FILES['foto']['name'];
                        $caminho_atual = $_FILES['foto']['tmp_name'];
                        $nome_novo = md5(time().rand(0,999)).'.jpg';
                        $caminho_salvar = 'images/capa_filme/'.$nome_novo;
                        $diretorio_final = 'admin/images/capa_filme/'.$nome_novo;

                        if($titulo && $descricao && $nome_arquivo) {
                            if(move_uploaded_file($caminho_atual, $caminho_salvar)) {
                                $filmes->cadastrarFilmes($titulo,$descricao,$diretorio_final);
                            }
                        }else { ?>

                        <div class="alert alert-warning" style="margin: 5px;">
                            <span>os campos não podem ser vazios</span>
                        </div>
                    <?php  
                        }
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-6">
                        <label for="Nome do filme">Nome</label>
                        <input type="text" name="titulo" placeholder="Nome do filme">

                        <label for="Descrição">Descrição</label>
                        <textarea name="descricao" id="" cols="30" rows="5" placeholder="Descrição do filme..."></textarea>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="foto">Capa do filme</label>
                        <input type="file" name="foto"> 
                    </div> 
                    
                    <div class="col-md-6">
                        <input type="submit" name="cadastrar" value="cadastrar">
                    </div>
                    
                </form>
            </div>

            <div class="title-filmes"><h2>Filmes cadastrados <i id="angle-up" class="fa-solid fa-angle-up"></i><i id="angle-down" class="fa-solid fa-angle-down"></i></h2></div>
            <div class="area-filmes">
                <table id="table-special" class="table table-striped">
                    <tr>
                        <th>Nome</th>
                        <th>Avaliação</th>
                        <th>Ação</th>
                    </tr>
                  
                    <?php $filmes->listarFilmes(); ?>
                </table>
            </div>
        </div>
    </section>



    <script>

        document.querySelector('.title-form').addEventListener('click', showForm);
        document.querySelector('.title-filmes').addEventListener('click', showTable);
        document.querySelector('#handleMenu').addEventListener('click', openSideBar);
        document.querySelector('.close-menu-btn').addEventListener('click', closeSideBar);

        function showForm() {
            let angle_up = document.getElementById('angle-up1');
            let angle_down = document.getElementById('angle-down1');
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

        function showTable() {
            let angle_up = document.getElementById('angle-up');
            let angle_down = document.getElementById('angle-down');
            let table = document.querySelector('.area-filmes');

            if(table.style.display == 'block') {
                angle_up.style.display = 'none';
                angle_down.style.display = 'block';
                table.style.display = 'none';
            }else {
                angle_up.style.display = 'block';
                angle_down.style.display = 'none';
                table.style.display = 'block';
            }
        }

        function openSideBar() {
            let sidebar = document.querySelector('.side-bar');
            let right_side = document.querySelector('.content');


            if(sidebar.style.display == 'block') {
                sidebar.style.display = 'none';
            }else {
                sidebar.style.display = 'block';
            }
        }

        function closeSideBar() {
            let sidebar = document.querySelector('.side-bar');

            if(sidebar.style.display == 'block') {
                sidebar.style.display = 'none';
            }
        }

    </script>

    <script src="../assets/script/script.js"></script>
    <script src="https://kit.fontawesome.com/e3dc242dae.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>