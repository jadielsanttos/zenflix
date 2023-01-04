<?php

require 'config.php';

if(!empty($_GET['id']) && !empty($_GET['voto'])) {
    $id = intval($_GET['id']);
    $voto = intval($_GET['voto']);


    if($voto >= 1 && $voto <= 5) {

        $sql = $pdo->prepare("INSERT INTO votos SET id_filme = :id_filme, voto = :voto");
        $sql->bindValue(':id_filme', $id);
        $sql->bindValue(':voto', $voto);
        $sql->execute();


        $sql = $pdo->prepare("UPDATE filmes SET media = (select (SUM(voto)/COUNT(*)) from votos where votos.id_filme = filmes.id) WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        header('location: index.php');
        exit;
    }else {
        echo '<script>alert("não foi dessa vez!!")</script>';
    }
}
header('location: index.php');