<?php
require_once '../backend/Categorias.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Certifique-se de que os dados foram recebidos do formulário
    if (isset($_POST['id_categoria'], $_POST['nome'], $_POST['display_on_menu'])) {
        // Obtenha os dados do formulário
        $id_categoria = $_POST['id_categoria'];
        $nome = $_POST['nome'];
        $display_on_menu = $_POST['display_on_menu'];

        // Crie uma instância da classe Categorias
        $categorias = new Categoria();

        // Chame o método update
        $result = $categorias->update($id_categoria, $nome, $display_on_menu);

        // Verifique se a atualização foi bem-sucedida
        if ($result) {
            echo "Categoria atualizada com sucesso!";
            header('Location: ../pagina_categoria.php');
        } else {
            echo "Erro ao atualizar a categoria. Por favor, tente novamente.";
        }
    } else {
        echo "Dados incompletos recebidos do formulário.";
    }
} else {
    echo "Acesso inválido ao script.";
}
?>
