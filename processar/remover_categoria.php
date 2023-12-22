<?php
// Inclua a classe Categorias
require_once '../backend/Categorias.php';

// Verifique se o ID da categoria foi passado
if (isset($_GET['id_categoria'])) {
    // Recupere o ID da categoria
    $categoria_id = $_GET['id_categoria'];

    // Crie uma instância da classe Categorias
    $categorias = new Categoria();

    // Remova a categoria
    $result = $categorias->delete($categoria_id);

    if ($result) {
        // Redirecione de volta para a página anterior após a remoção
        header('Location: ../pagina_categoria.php');
        exit;
    } else {
        // Exiba uma mensagem de erro em caso de falha na remoção
        echo "Erro ao remover a categoria. Por favor, tente novamente.";
    }
} else {
    // Exiba uma mensagem de erro se o ID da categoria não foi passado
    echo "ID da categoria não fornecido. Por favor, forneça o ID da categoria a ser removida.";
}
?>
