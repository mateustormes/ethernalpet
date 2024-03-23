<?php
print_r($_POST);
// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos necessários estão definidos
    if (isset($_POST['fk_usuario']) && isset($_POST['fk_promocoes']) && isset($_POST['status_ticket'])) {
        // Inclui a classe Ticket
        require_once '../backend/Ticket.php';

        // Recupera os dados do formulário
        $fk_usuario = $_POST['fk_usuario'];
        $fk_promocoes = $_POST['fk_promocoes'];
        $status_ticket = $_POST['status_ticket'];

        // Cria uma instância da classe Ticket
        $ticket = new Ticket();

        // Insere o novo ticket
        $result = $ticket->insert($fk_usuario, $fk_promocoes, $status_ticket);

        if ($result !== false) {
            // Redireciona de volta para a página anterior após o cadastro
            $_SESSION['mensagem'] = "Ticket cadastrado com sucesso!";
            header("Location: ../adminPage.php?mensagem=" . urlencode($_SESSION['mensagem']));
            exit;
        } else {
            // Exibe uma mensagem de erro em caso de falha no cadastro
            // $_SESSION['mensagem'] = "Erro ao cadastrar o ticket. Por favor, tente novamente.";
            // header("Location: ../adminPage.php?mensagem=" . urlencode($_SESSION['mensagem']));
            exit;
        }
    } else {
        // Exibe uma mensagem de erro se os campos necessários não estiverem definidos
        echo "Erro nos parâmetros do formulário. Por favor, preencha todos os campos.";
    }
} else {
    // Exibe uma mensagem de erro se o método de requisição não for POST
    echo "Erro no método de requisição. Este script deve ser acessado via POST.";
}
?>
