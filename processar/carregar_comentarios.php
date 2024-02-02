<?php
// carregar_comentarios.php

require_once '../backend/ComentarioPost.php';

$id = $_GET['id_post'];
$comentarioPost = new ComentarioPost();
$comentarios = $comentarioPost->selectByFkPostId($id);

// Retorna os comentários como JSON
echo json_encode($comentarios);
?>
