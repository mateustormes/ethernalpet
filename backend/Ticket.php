<?php
require_once 'Conexao.php';

class Ticket {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function insert($fk_usuario, $fk_promocoes, $status_ticket) {
        $sql = "INSERT INTO tickets (fk_usuario, fk_promocoes, status_ticket) 
                VALUES ($fk_usuario, $fk_promocoes, '$status_ticket')";
        return $this->conexao->query($sql);
    }

    public function selectAll() {
        $sql = "SELECT t.id_ticket, u.nome AS nome_usuario, p.nome AS nome_promocao, t.status_ticket 
                FROM tickets t 
                INNER JOIN usuarios u ON t.fk_usuario = u.id 
                INNER JOIN promocoes p ON t.fk_promocoes = p.id";
        $result = $this->conexao->query($sql);
        
    if (!$result) {
        // Se a consulta falhar, exiba uma mensagem de erro ou registre o erro
        echo "Erro na consulta SQL: " . $this->conexao->error;
        return []; // Retorna um array vazio ou outra indicação de erro
    }
        $tickets = [];
    
        while ($row = $result->fetch_assoc()) {
            $tickets[] = $row;
        }
    
        return $tickets;
    }

    public function updateStatusTicket($id_ticket, $novo_status) {
        $sql = "UPDATE tickets SET status_ticket = ? WHERE id_ticket = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("si", $novo_status, $id_ticket);
        return $stmt->execute();
    }
    
    
}
?>
