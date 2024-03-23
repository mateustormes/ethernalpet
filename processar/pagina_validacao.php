<?php
session_start();
require_once '../backend/Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['inputEmail'];
    $senha = $_POST['inputPassword'];

    $usuarios = new Usuarios();
    $usuario = $usuarios->selectAllByEmail($email);

    if ($usuario && $senha==$usuario['senha']) {
        $_SESSION['usuario'] = $usuario['nome']; // Armazenar o nome do usuário na sessão
        $_SESSION['id_usuario'] = $usuario['id']; // Armazenar o nome do usuário na sessão
        $_SESSION['admin'] = $usuario['administrador']; // Armazenar o nome do usuário na sessão
        
        header('Location: ../adminPage.php'); // Redirecionar para a página do menu
        exit();
    } else {
        header('Location: ../index.php'); // Redirecionar para a página do menu
        exit();
    }
}
?>