<?php
// Verifica se o parâmetro id_ticket foi passado na URL
if (isset($_GET['id_ticket'])) {
    $id_ticket = $_GET['id_ticket'];

    // Aqui você precisa atualizar o status do ticket com base no ID fornecido
    // Você pode fazer isso chamando o método updateStatusTicket da classe Ticket

    require_once '../backend/Ticket.php';
    $ticket = new Ticket();

    // Suponha que o novo status do ticket seja 'Finalizado'
    $novo_status = 'Finalizado';

    // Atualize o status do ticket
    $atualizado = $ticket->updateStatusTicket($id_ticket, $novo_status);

    if ($atualizado) {
        // Redirecione de volta para a página de recibos após a atualização
        header('Location: ../recibos.php');
        exit();
    } else {
        echo 'Erro ao atualizar o status do ticket.';
    }
} else {
    echo 'ID do ticket não especificado na URL.';
}
?>
