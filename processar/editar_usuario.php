<?php
require_once '../backend/Usuarios.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Certifique-se de que os dados foram recebidos do formulário
    if (isset($_POST['id_usuario'], $_POST['nome'], $_POST['email'], $_POST['admin'])) {
        // Obtenha os dados do formulário
        $id_usuario = $_POST['id_usuario'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $admin = $_POST['admin'];

        // Crie uma instância da classe Usuarios
        $usuarios = new Usuarios();

        // Chame o método update
        $result = $usuarios->update($id_usuario, $nome, $email, $admin);

        // Verifique se a atualização foi bem-sucedida
        if ($result) {
            echo "Usuário atualizado com sucesso!";
            header('Location: ../pagina_usuarios.php');
        } else {
            echo "Erro ao atualizar o usuário. Por favor, tente novamente.";
        }
    } else {
        echo "Dados incompletos recebidos do formulário.";
    }
} else {
    echo "Acesso inválido ao script.";
}
?>
