<?php
require '../config.php';

class Filmes {
    public $pdo;

    public function cadastrarFilmes($titulo,$descricao) {
        global $pdo;

        $media = 0;

        $sql = $pdo->prepare("SELECT * FROM filmes WHERE titulo = :titulo");
        $sql->bindValue(':titulo', $titulo);
        $sql->execute();

        if($sql->rowCount() > 0) {
            echo "<script>alert('esse filme ja está cadastrado')</script>";
        }

        $sql = $pdo->prepare("INSERT INTO filmes VALUES (null,?,?,?)");
        $sql->execute(array($titulo,$descricao,$media));

        echo "<script>alert('cadastrado com sucesso!')</script>";
    

    }

    public function listarFilmes() {
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM filmes");
        $sql->execute();
        $info = $sql->fetchAll();

        if($sql->rowCount() > 0) {
            
            foreach($info as $filme) { ?>
                <tr>
                    <td><?=$filme['titulo'];?></td>
                    <td><?=$filme['descricao'];?></td>
                    <td><?=$filme['media'];?></td>
                    <td>
                        <a href="editar.php?id=<?=$filme['id'];?>" id="link-edit"><i class="fa-solid fa-pen"></i></a>
                        <a href="excluir.php?id=<?=$filme['id'];?>" id="link-delete" onclick="return confirm('Deseja excluir mesmo?')"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                
            <?php
                
            }

        }


    }

    public function editarFilmes($titulo,$descricao,$media) {
        global $pdo;
        $id = filter_input(INPUT_GET, 'id');

        if($id && $titulo && $descricao && $media) {
            $sql = $pdo->prepare("UPDATE filmes SET titulo = :titulo, descricao = :descricao, media = :media WHERE id = :id");
            $sql->bindValue(':titulo', $titulo);
            $sql->bindValue(':descricao', $descricao);
            $sql->bindValue(':media', $media);
            $sql->bindValue(':id', $id);
            $sql->execute();

            echo "<script>alert('dados atualizados!')</script>";

        }else {
            echo "<script>alert('ERRO!!')</script>";
        }
        
    }
}