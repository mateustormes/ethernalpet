<?php
require_once '../backend/Empresas.php'; // Substitua pelo caminho correto do seu arquivo Empresas.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Certifique-se de que os dados foram recebidos do formulário
    if (isset($_POST['id_empresa'], $_POST['nome'], $_POST['endereco'], $_POST['cnpj'])) {
        // Obtenha os dados do formulário
        $id_empresa = $_POST['id_empresa'];
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $cnpj = $_POST['cnpj'];

        // Crie uma instância da classe Empresas
        $empresas = new Empresas();

        // Chame o método update
        $result = $empresas->update($id_empresa, $nome, $endereco, $cnpj);

        // Verifique se a atualização foi bem-sucedida
        if ($result) {
            echo "Empresa atualizada com sucesso!";
            header('Location: ../pagina_empresas.php');
        } else {
            echo "Erro ao atualizar a empresa. Por favor, tente novamente.";
        }
    } else {
        echo "Dados incompletos recebidos do formulário.";
    }
} else {
    echo "Acesso inválido ao script.";
}
?>
