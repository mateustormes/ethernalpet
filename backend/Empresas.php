<?php
require_once 'Conexao.php';

class Empresas {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function insert($nome, $endereco, $cnpj) {
        $sql = "INSERT INTO empresas (nome, endereco, cnpj) VALUES ('$nome', '$endereco', '$cnpj')";
        return $this->conexao->query($sql);
    }

    public function selectAll() {
        $sql = "SELECT * FROM empresas";
        $result = $this->conexao->query($sql);
        $empresas = [];

        while ($row = $result->fetch_assoc()) {
            $empresas[] = $row;
        }

        return $empresas;
    }

    public function selectById($id) {
        $sql = "SELECT * FROM empresas WHERE id=$id";
        $result = $this->conexao->query($sql);
        return $result->fetch_assoc();
    }

    public function update($id, $nome, $endereco, $cnpj) {
        $sql = "UPDATE empresas SET nome='$nome', endereco='$endereco', cnpj='$cnpj' WHERE id=$id";
        return $this->conexao->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM empresas WHERE id=$id";
        return $this->conexao->query($sql);
    }
}
?>
