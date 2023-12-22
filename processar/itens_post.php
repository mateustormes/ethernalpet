<?php
require_once '../backend/ItensPost.php'; // Substitua pelo caminho correto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_pet = $_POST['nome_pet'];
    $informacoes_pet = $_POST['informacoes_pet'];

    // Verifica se o arquivo foi enviado sem erros
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $item = file_get_contents($_FILES['file']['tmp_name']); // Obtém o conteúdo do arquivo

        // Insira no banco de dados
        $itensPost = new ItensPost(); // Substitua pelo caminho correto
        $itensPost->insertItem(1, $item, $nome_pet, $informacoes_pet);

        echo 'Arquivo enviado com sucesso!';
    } else {
        echo 'Erro no envio do arquivo.';
    }
}
?>
