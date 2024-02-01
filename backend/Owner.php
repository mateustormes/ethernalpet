<?php
require_once 'Conexao.php';

class Owner {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function insert($nome, $caminho_foto, $cargo) {
        // Use prepared statements para evitar SQL injection
        $sql = "INSERT INTO owners (nome, caminho_foto, cargo) VALUES (?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("sss", $nome, $caminho_foto, $cargo);

        return $stmt->execute();
    }

    public function selectAll() {
        $sql = "SELECT * FROM owners";
        $result = $this->conexao->query($sql);
        $owners = [];

        while ($row = $result->fetch_assoc()) {
            $owners[] = $row;
        }

        return $owners;
    }

    public function selectById($id) {
        $sql = "SELECT * FROM owners WHERE id=?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    public function update($id, $nome, $caminho_foto, $cargo) {
        $sql = "UPDATE owners SET nome=?, caminho_foto=?, cargo=? WHERE id=?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("sssi", $nome, $caminho_foto, $cargo, $id);

        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM owners WHERE id=?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }
}
?>
