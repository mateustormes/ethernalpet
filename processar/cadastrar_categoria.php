<?php
// Inclua a classe Categorias
require_once '../backend/Categorias.php';

$displayMenu = null;
if(!isset($_POST['display_on_menu'])){
    $displayMenu = 'N';
}else{
    $displayMenu  = $_POST['display_on_menu'];
}
// Verifique se o formulário foi submetido e se os campos necessários estão definidos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && $displayMenu != null) {
    // Recupere os dados do formulário
    $nome = $_POST['nome'];
    $display_on_menu = ($displayMenu === 'S') ? 'S' : 'N';

    // Crie uma instância da classe Categorias
    $categorias = new Categoria();

    // Insira a nova categoria
    $result = $categorias->insert($nome, $display_on_menu);

    if ($result) {
        // Redirecione de volta para a página anterior após o cadastro
        header('Location: ../pagina_categoria.php');
        exit;
    } else {
        // Exiba uma mensagem de erro em caso de falha na inserção
        echo "Erro ao cadastrar a categoria. Por favor, tente novamente.";
    }
} else {
    // Exiba uma mensagem de erro se os campos necessários não estiverem definidos
    echo "Erro nos parâmetros do formulário. Por favor, preencha todos os campos.";
}
?>
