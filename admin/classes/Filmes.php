<?php
require '../config.php';

class Filmes {
    public $pdo;

    public function cadastrarFilmes($titulo,$descricao,$foto) {
        global $pdo;
        $media = 0;


        $sql = $pdo->prepare("SELECT * FROM filmes WHERE titulo = :titulo");
        $sql->bindValue(':titulo', $titulo);
        $sql->execute();

        if($sql->rowCount() > 0) {
            echo "<script>alert('esse filme ja está cadastrado')</script>";
        }

        $sql = $pdo->prepare("INSERT INTO filmes VALUES (null,?,?,?,?)");
        $sql->execute(array($titulo,$descricao,$media,$foto));

        echo "<script>alert('cadastrado com sucesso!')</script>";
    

    }

    public function listarFilmes() {
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM filmes ORDER BY id DESC");
        $sql->execute();
        $info = $sql->fetchAll();

        if($sql->rowCount() > 0) {
            
            foreach($info as $filme) { ?>
                <tr>
                    <td><?=$filme['titulo'];?></td>
                    <td><?=number_format($filme['media'], 2);?></td>
                    <td class="td-single">
                        <a href="editar.php?id=<?=$filme['id'];?>" id="link-edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="excluir.php?id=<?=$filme['id'];?>" id="link-delete" onclick="return confirm('Deseja excluir mesmo?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                
            <?php
                
            }

        }


    }

    public function editarFilmes($titulo,$descricao,$media,$url_trailer) {
        global $pdo;
        $id = filter_input(INPUT_GET, 'id');

        if($id) {

            $sql = $pdo->prepare("UPDATE filmes SET titulo = :titulo, descricao = :descricao, media = :media, url_trailer = :url_trailer WHERE id = :id");
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':media', $media);
            $sql->bindValue(':url_trailer', $url_trailer);
            $sql->bindValue(':id', $id);
            $sql->execute();

            echo "<script>alert('dados atualizados!')</script>";

        }else {
            echo "<script>alert('ERRO!!')</script>";
        }
        
    }

    public function editarCapaFilmes($foto) {
        global $pdo;
        $id = filter_input(INPUT_GET, 'id');

        $this->excluirArquivoImagem($id);

        $sql = $pdo->prepare("UPDATE filmes SET dir_foto = :dir_foto WHERE id = :id");
        $sql->bindValue(':dir_foto', $foto);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function excluirFilmes($id) {
        global $pdo;

        if($id) {

            $this->excluirArquivoImagem($id);
            $sql = $pdo->prepare("DELETE FROM filmes WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            header('location: index.php');
        }else {
            echo '<script>alert("Ação recusada!")</script>';
            echo '<script>window.location.href = "index.php"</script>';
        }

    }

    public function excluirArquivoImagem($id) {
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM filmes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        $info = $sql->fetch();
        $valor = $info['dir_foto'];

        unlink('../'.$valor);
    }

    public function excluirImagemDB($id) {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM filmes WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}