<?php
require_once 'classes/Filmes.php';
$filmes = new Filmes();

$id = filter_input(INPUT_GET, 'id');

$filmes->excluirFilmes($id);

/*
if($id) {

$sql = $pdo->prepare("DELETE FROM filmes WHERE id = :id");
$sql->bindValue(':id', $id);
$sql->execute();

header('location: index.php');  

}else {
    echo '<script>alert("Ação recusada!")</script>';
}
*/

?>