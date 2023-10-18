<?php

$db_host = "localhost";
$db_name = "zenflix";
$db_user = "root";
$db_pass = "";

try{
    $pdo = new PDO("mysql:dbname=$db_name;host=$db_host", "$db_user", "$db_pass");
}catch(PDOException $e) {
    echo 'ERRO: '.$e->getMessage();
    exit;
}
