<?php
// Inclua a classe Usuarios
require_once '../backend/Usuarios.php';

// Verifique se o ID do usuário foi passado
if (isset($_GET['id_usuario'])) {
    // Recupere o ID do usuário
    $usuario_id = $_GET['id_usuario'];

    // Crie uma instância da classe Usuarios
    $usuarios = new Usuarios();

    // Remova o usuário
    $result = $usuarios->delete($usuario_id);

    if ($result) {
        // Redirecione de volta para a página anterior após a remoção
        header('Location: ../pagina_usuarios.php');
        exit;
    } else {
        // Exiba uma mensagem de erro em caso de falha na remoção
        echo "Erro ao remover o usuário. Por favor, tente novamente.";
    }
} else {
    // Exiba uma mensagem de erro se o ID do usuário não foi passado
    echo "ID do usuário não fornecido. Por favor, forneça o ID do usuário a ser removido.";
}
?>
