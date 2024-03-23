<?php

echo "<pre>post:";
print_r($_POST);
echo "get";
print_r($_GET);
echo "files";
print_r($_FILES);
echo "</pre>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários foram preenchidos
    if (isset($_POST['data_deposito']) && isset($_POST['nome_recibo']) && isset($_POST['descricao']) && isset($_FILES['foto_recibo']) && isset($_POST['fk_ticket'])) {
        $data_deposito = $_POST['data_deposito'];
        $nome_recibo = $_POST['nome_recibo'];
        $descricao = $_POST['descricao'];
        $fk_ticket = $_POST['fk_ticket'];

        // Verifica se o arquivo foi enviado sem erros
        if ($_FILES['foto_recibo']['error'] === 0) {
            // Abre o arquivo em modo de leitura binária
            $conteudo_foto = file_get_contents($_FILES['foto_recibo']['tmp_name']);
            
            if ($conteudo_foto !== false) {
                // Agora chamamos o backend para inserir o recibo
                require_once '../backend/Recibo.php';
                $recibo = new Recibo();
                
                // Chama a função para inserir o recibo
                $inserido = $recibo->criarRecibo($data_deposito, $nome_recibo, $conteudo_foto, $descricao, $fk_ticket);
                
                if ($inserido) {
                    // Redireciona para a página de recibos
                    header('Location: ../recibos.php?id_ticket=' . $fk_ticket);
                    exit();
                } else {
                    // Se houve um erro ao inserir o recibo, redireciona para a página de recibos
                    header('Location: ../recibos.php?id_ticket=' . $fk_ticket);
                    exit();
                }
            } else {
                // Se houve um erro ao ler o conteúdo do arquivo, retorna uma mensagem de erro
                echo 'Erro ao ler conteúdo do arquivo';
            }
        } else {
            // Se não houve arquivo enviado ou ocorreu algum erro, retorna uma mensagem de erro
            echo 'Erro ao enviar arquivo';
        }
    } else {
        // Se algum campo do formulário não foi enviado, redireciona para a página de recibos
        header('Location: ../recibos.php');
        exit();
    }
} else {
    // Se o método de requisição não for POST, redireciona para a página de recibos
    header('Location: ../recibos.php');
    exit();
}
?>
