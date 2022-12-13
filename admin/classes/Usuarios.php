<?php
session_start();
require '../config.php';

class Usuarios {
    public $pdo;

    public function loginPainel($email,$password) {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM usuarios_admin WHERE email_usuario_admin = :email AND senha_usuario_admin = :senha");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $password);
        $sql->execute();

        if($sql->rowCount() > 0) {
            $data = $sql->fetch();

            $_SESSION['login'] = $data['id_usuario_admin'];
            header('location: index.php');
            exit;
        }else {
            header('location: login.php');
            exit;
        }

    }
}