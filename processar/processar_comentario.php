<?php
// processar_comentario.php

require_once '../backend/ComentarioPost.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $mensagem = $_POST['message'];
    $id_post = $_POST['id_post'];

    $comentarioPost = new ComentarioPost();
    $resultado = $comentarioPost->insert($id_post , $nome, $email, $mensagem); // Supondo que 1 é o ID do post relacionado

    if ($resultado) {
        echo json_encode(['status' => 'success', 'message' => 'Comentário enviado com sucesso']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao enviar o comentário']);
    }
} else {
    // Se a requisição não for POST, redirecione ou trate conforme necessário
    header("Location: index.php");
    exit();
}
?>
