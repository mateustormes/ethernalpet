<?php
// carregar_comentarios.php

require_once '../backend/ComentarioPost.php';

$comentarioPost = new ComentarioPost();
$comentarios = $comentarioPost->selectAll();

// Retorna os comentários como JSON
echo json_encode($comentarios);
?>
