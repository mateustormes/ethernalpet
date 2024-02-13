<?php
require_once '../backend/ItensPost.php'; // Substitua pelo caminho correto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_item = $_POST['id_item']; // Adicione o campo oculto no formulário HTML para enviar o ID do item a ser atualizado
    $nome_pet = $_POST['nome_pet'];
    $informacoes_pet = $_POST['informacoes_pet'];

    // Verifica se o arquivo foi enviado sem erros
    if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) { // Corrigido para $_FILES['imagem']
        $item = file_get_contents($_FILES['imagem']['tmp_name']); // Corrigido para $_FILES['imagem']

        // Insira no banco de dados
        $itensPost = new ItensPost(); // Substitua pelo caminho correto
        
        // Verifica se o ID do item é válido antes de tentar atualizar
        if (!empty($id_item)) {
            $itensPost->updateItem($id_item, $item, $nome_pet, $informacoes_pet);
            echo 'Item atualizado com sucesso!';
            
            header('Location: ../itens_post.php?id_post='.$id_item);
        } else {
            echo 'ID do item inválido.';
        }
    } else {
        echo 'Erro no envio do arquivo.';
    }
}
?>
