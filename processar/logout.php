<?php
// Inicia a sessão se ainda não estiver iniciada
session_start();

// Limpa todos os dados da sessão
$_SESSION = array();

// Destroi a sessão
session_destroy();

// Redireciona para a página desejada
header("Location: ../index.php");
exit; // Certifica-se de que o código não continua a ser executado após o redirecionamento
?>
