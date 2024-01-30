<?php
require_once 'Conexao.php';

class Categoria {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function insert($nome, $display_on_menu) {
        $sql = "INSERT INTO categoria (nome, display_on_menu) VALUES ('$nome', '$display_on_menu')";
        return $this->conexao->query($sql);
    }

    public function selectAll() {
        $sql = "SELECT * FROM categoria";
        $result = $this->conexao->query($sql);
        $categorias = [];

        while ($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }

        return $categorias;
    }

    public function selectAllWhereDisplay() {
        $sql = "SELECT * FROM categoria where display_on_menu = 'S'";
        $result = $this->conexao->query($sql);
        $categorias = [];

        while ($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }

        return $categorias;
    }

    public function selectById($id) {
        $sql = "SELECT * FROM categoria WHERE id=$id";
        $result = $this->conexao->query($sql);
        return $result->fetch_assoc();
    }

    public function update($id, $nome, $display_on_menu) {
        $sql = "UPDATE categoria SET nome='$nome', display_on_menu='$display_on_menu' WHERE id=$id";
        return $this->conexao->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM categoria WHERE id=$id";
        return $this->conexao->query($sql);
    }
}
?>
