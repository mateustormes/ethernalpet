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

    // Crie uma instância da classe Usuarios
    $usuarios = new Usuarios();

    // Insira o novo usuário
    $result = $usuarios->insert($nome, $fk_empresa, $email, $senha);

    if ($result) {
        // Redirecione de volta para a página anterior após o cadastro
        header('Location: ../pagina_usuarios.php');
        exit;
    } else {
        // Exiba uma mensagem de erro em caso de falha na inserção
        echo "Erro ao cadastrar o usuário. Por favor, tente novamente.";
    }
} else {
    // Exiba uma mensagem de erro se os campos necessários não estiverem definidos
    echo "Erro nos parâmetros do formulário. Por favor, preencha todos os campos.";
}
?>
