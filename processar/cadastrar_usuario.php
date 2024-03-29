<?php
// Inclua a classe Usuarios
require_once '../backend/Usuarios.php';

// Verifique se o formulário foi submetido e se os campos necessários estão definidos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && isset($_POST['fk_empresa']) && isset($_POST['email']) && isset($_POST['senha'])) {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $fk_empresa = $_POST['fk_empresa'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Use hash para armazenar senhas de forma segura
    $admin = $_POST['admin'];
    // Crie uma instância da classe Usuarios
    $usuarios = new Usuarios();

    // Insira o novo usuário
    $result = $usuarios->insert($nome, $fk_empresa, $email, $senha, $admin);

    if ($result !== false) {
        // Redirecione de volta para a página anterior após o cadastro
        $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
        exit;
    } else {
        // Exiba uma mensagem de erro se o e-mail já existir
        $_SESSION['mensagem'] = "Erro ao cadastrar o usuário. Por favor, tente novamente.";
    }

    header("Location: ../pagina_usuarios.php?mensagem=" . urlencode($_SESSION['mensagem']));
} else {
    // Exiba uma mensagem de erro se os campos necessários não estiverem definidos
    echo "Erro nos parâmetros do formulário. Por favor, preencha todos os campos.";
}
?>
