<?php
// Inclua a classe Empresas
require_once '../backend/Empresas.php';

// Verifique se o ID da empresa foi passado
if (isset($_GET['id'])) {
    // Recupere o ID da empresa
    $empresa_id = $_GET['id'];

    // Crie uma instância da classe Empresas
    $empresas = new Empresas();

    // Remova a empresa
    $result = $empresas->delete($empresa_id);

    if ($result) {
        // Redirecione de volta para a página anterior após a remoção
        header('Location: ../pagina_empresas.php');
        exit;
    } else {
        // Exiba uma mensagem de erro em caso de falha na remoção
        echo "Erro ao remover a empresa. Por favor, tente novamente.";
    }
} else {
    // Exiba uma mensagem de erro se o ID da empresa não foi passado
    echo "ID da empresa não fornecido. Por favor, forneça o ID da empresa a ser removida.";
}
?>
