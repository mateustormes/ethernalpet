<?php
// Inclua a classe Posts
require_once '../backend/Posts.php';

if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    // Verifique se o formulário foi submetido e se os campos necessários estão definidos
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && isset($_POST['data']) && isset($_POST['codigo']) && isset($_POST['categoria'])) {
        // Recupere os dados do formulário
        $nome_post = $_POST['nome'];
        $dt_user = $_POST['data'];
        $cd_user = $_POST['codigo'];
        $fk_categoria = $_POST['categoria'];

        $imagem_blob = file_get_contents($_FILES['imagem']['tmp_name']);

        // Crie uma instância da classe Posts
        $posts = new Posts();

        // Insira o novo post
        $result = $posts->insert($nome_post, $dt_user, $cd_user, $fk_categoria, $imagem_blob);

        if ($result) {
            // Redirecione de volta para a página anterior após o cadastro
            header('Location: ../pagina_posts.php');
            exit;
        } else {
            // Exiba uma mensagem de erro em caso de falha na inserção
            echo "Erro ao cadastrar o post. Por favor, tente novamente.";
            echo $posts->conexao->error;
        }
    } else {
        // Exiba uma mensagem de erro se os campos necessários não estiverem definidos
        echo "Erro nos parâmetros do formulário. Por favor, preencha todos os campos.";
    }
} else {
    echo 'Erro no envio do arquivo.';
}
?>
