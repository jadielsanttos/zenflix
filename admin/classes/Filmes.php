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
}