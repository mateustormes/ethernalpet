<?php
require_once '../backend/Posts.php'; // Substitua pelo caminho correto do seu arquivo Posts.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    // Certifique-se de que os dados foram recebidos do formulário
    if (isset($_POST['id_post'], $_POST['nome_post'], $_POST['dt_user'], $_POST['cd_user'], $_POST['fk_categoria'])) {
        // Obtenha os dados do formulário
        $id_post = $_POST['id_post'];
        $nome_post = $_POST['nome_post'];
        $dt_user = $_POST['dt_user'];
        $cd_user = $_POST['cd_user'];
        $fk_categoria = $_POST['fk_categoria'];

        // Crie uma instância da classe Posts
        $posts = new Posts();

        // Chame o método update
        $result = $posts->update($id_post, $nome_post, $dt_user, $cd_user, $fk_categoria);

        // Verifique se a atualização foi bem-sucedida
        if ($result) {
            echo "Post atualizado com sucesso!";
            header('Location: ../pagina_posts.php');
        } else {
            echo "Erro ao atualizar o post. Por favor, tente novamente.";
        }
    } else {
        echo "Dados incompletos recebidos do formulário.";
    }
} else {
    echo "Acesso inválido ao script.";
}
?>
