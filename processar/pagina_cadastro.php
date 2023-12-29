<?php
require_once '../backend/Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['inputNovoNome'];
    $fk_empresa = 1;
    $email = $_POST['inputNovoEmail'];
    $senha = $_POST['inputNovaSenha'];

    $usuarios = new Usuarios();
    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

     // Insira o novo usuário
     $result = $usuarios->insert($nome, $fk_empresa, $email, $senha);

     if ($result !== false) {
         // Redirecione de volta para a página anterior após o cadastro
         $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
         exit;
     } else {
         // Exiba uma mensagem de erro se o e-mail já existir
         $_SESSION['mensagem'] = "Erro ao cadastrar o usuário. Por favor, tente novamente.";
     }

     header("Location: ../pagina_usuarios.php?mensagem=" . urlencode($_SESSION['mensagem']));
}
?>