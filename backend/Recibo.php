<?php
require_once 'Conexao.php';

class Recibo {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function criarRecibo($data_deposito, $nome_recibo, $foto_recibo, $descricao, $fk_ticket) {
        $sql = "INSERT INTO recibos (data_deposito, nome_recibo, foto_recibo, descricao, fk_ticket) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("ssssi", $data_deposito, $nome_recibo, $foto_recibo, $descricao, $fk_ticket);
        return $stmt->execute();
    }

    public function listarRecibos() {
        $sql = "SELECT * FROM recibos";
        $result = $this->conexao->query($sql);
        $recibos = [];

        while ($row = $result->fetch_assoc()) {
            $recibos[] = $row;
        }

        return $recibos;
    }

    public function listarReciboPorTicket($id_ticket) {
        $sql = "SELECT * FROM recibos WHERE fk_ticket = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("i", $id_ticket);
        $stmt->execute();
        $result = $stmt->get_result();
        $recibos = [];
    
        while ($row = $result->fetch_assoc()) {
            $recibos[] = $row;
        }
    
        return $recibos;
    }
    public function getReciboById($id_recibo) {
        $sql = "SELECT * FROM recibos WHERE id_recibo = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("i", $id_recibo);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Verifica se há algum resultado
        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); // Retorna os dados do recibo
        } else {
            return false; // Retorna falso se o recibo não for encontrado
        }
    }
}
?>
