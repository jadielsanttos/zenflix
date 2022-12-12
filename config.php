<?php

try{
    $pdo = new PDO("mysql:dbname=rating;host=localhost", "root", "");
}catch(PDOException $e) {
    echo 'ERRO: '.$e->getMessage();
    exit;
}
