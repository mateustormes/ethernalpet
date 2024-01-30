<?php
require_once 'Conexao.php';

class ComentarioPost {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function insert($fk_post, $nome, $email, $mensagem) {
        // Use prepared statements para evitar SQL injection
        $sql = "INSERT INTO comentarios_post (fk_post, nome, email, mensagem) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("isss", $fk_post, $nome, $email, $mensagem);

        return $stmt->execute();
    }

    public function selectAll() {
        $sql = "SELECT * FROM comentarios_post";
        $result = $this->conexao->query($sql);
        $comentarios = [];

        while ($row = $result->fetch_assoc()) {
            $comentarios[] = $row;
        }

        return $comentarios;
    }

    public function selectById($id) {
        $sql = "SELECT * FROM comentarios_post WHERE id=?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function update($id, $fk_post, $nome, $email, $mensagem) {
        $sql = "UPDATE comentarios_post SET fk_post=?, nome=?, email=?, mensagem=? WHERE id=?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("isssi", $fk_post, $nome, $email, $mensagem, $id);

        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM comentarios_post WHERE id=?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}
?>
