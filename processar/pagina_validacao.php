<?php
session_start();
require_once '../backend/Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['inputEmail'];
    $senha = $_POST['inputPassword'];

    $usuarios = new Usuarios();
    $usuario = $usuarios->selectAllByEmail($email);

    if ($usuario && $senha==$usuario['senha']) {
        $_SESSION['usuario'] = $usuario['nome']; // Armazenar o nome do usuário na sessão, por exemplo
        header('Location: ../adminPage.php'); // Redirecionar para a página do menu
        exit();
    } else {
        echo 'Login falhou.';
    }
}
?>