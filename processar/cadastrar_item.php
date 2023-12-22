<?php
// Inclua a classe ItensPost
require_once '../backend/ItensPost.php';
echo "<pre>";
print_r($_POST);
echo "<br>";
print_r($_FILES);
echo "</pre>";
if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    // Verifique se o formulário foi submetido e se os campos necessários estão definidos
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fk_post']) && isset($_POST['nome_pet']) && isset($_POST['informacoes_pet'])) {
        // Recupere os dados do formulário
        $fk_post = $_POST['fk_post'];
        $item = $_POST['item'];
        $nome_pet = $_POST['nome_pet'];
        $informacoes_pet = $_POST['informacoes_pet'];
        $imagem_blob = file_get_contents($_FILES['imagem']['tmp_name']);
        // Crie uma instância da classe ItensPost
        $itensPost = new ItensPost();

        // Insira o novo item
        $result = $itensPost->insertItem($fk_post, $imagem_blob, $nome_pet, $informacoes_pet);

        if ($result) {
            // Redirecione de volta para a página anterior após o cadastro
            header('Location: ../itens_post.php?id_post=' . $fk_post);
            exit;
        } else {
            // Exiba uma mensagem de erro em caso de falha na inserção
            echo "Erro ao cadastrar o item. Por favor, tente novamente.";
            echo $itensPost->conexao->error;
        }
    } else {
        // Exiba uma mensagem de erro se os campos necessários não estiverem definidos
        echo "Erro nos parâmetros do formulário. Por favor, preencha todos os campos.";
    }
} else {
    echo 'Erro no envio do arquivo.';
}
?>
