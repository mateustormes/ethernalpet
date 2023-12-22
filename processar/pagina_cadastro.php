<?php
require_once '../backend/Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['inputNovoNome'];
    $fk_empresa = 1;
    $email = $_POST['inputNovoEmail'];
    $senha = $_POST['inputNovaSenha'];

    $usuarios = new Usuarios();
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

    if ($usuarios->insert($nome, $fk_empresa, $email, $hashedSenha)) {
        echo 'Cadastro realizado com sucesso!';
    } else {
        echo 'Falha no cadastro.';
    }
}
?>