<?php
// Inclua a classe Posts
require_once '../backend/Posts.php';

// Verifique se o ID do post foi passado
if (isset($_GET['id_post'])) {
    // Recupere o ID do post
    $post_id = $_GET['id_post'];

    // Crie uma instância da classe Posts
    $posts = new Posts();

    // Remova o post
    $result = $posts->delete($post_id);

    if ($result) {
        // Redirecione de volta para a página anterior após a remoção
        header('Location: ../pagina_posts.php');
        exit;
    } else {
        // Exiba uma mensagem de erro em caso de falha na remoção
        echo "Erro ao remover o post. Por favor, tente novamente.";
    }
} else {
    // Exiba uma mensagem de erro se o ID do post não foi passado
    echo "ID do post não fornecido. Por favor, forneça o ID do post a ser removido.";
}
?>
