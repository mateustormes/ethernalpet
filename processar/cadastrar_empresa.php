<?php
// Inclua a classe Empresas
require_once '../backend/Empresas.php';

// Verifique se o formulário foi submetido e se os campos necessários estão definidos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && isset($_POST['endereco']) && isset($_POST['cnpj'])) {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $cnpj = $_POST['cnpj'];

    // Crie uma instância da classe Empresas
    $empresas = new Empresas();

    // Insira a nova empresa
    $result = $empresas->insert($nome, $endereco, $cnpj);

    if ($result) {
        // Redirecione de volta para a página anterior após o cadastro
        header('Location: ../pagina_empresas.php');
        exit;
    } else {
        // Exiba uma mensagem de erro em caso de falha na inserção
        echo "Erro ao cadastrar a empresa. Por favor, tente novamente.";
    }
} else {
    // Exiba uma mensagem de erro se os campos necessários não estiverem definidos
    echo "Erro nos parâmetros do formulário. Por favor, preencha todos os campos.";
}
?>
