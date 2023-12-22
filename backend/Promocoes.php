<?php
require_once 'Conexao.php';

class Promocoes {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function insert($nome, $preco, $descricao, $qtd_gb_armazenamento, $tempo_duracao) {
        $nome = $this->conexao->real_escape_string($nome);
        $descricao = $this->conexao->real_escape_string($descricao);

        $sql = "INSERT INTO promocoes (nome, preco, descricao, qtd_gb_armazenamento, tempo_duracao) 
                VALUES ('$nome', $preco, '$descricao', $qtd_gb_armazenamento, $tempo_duracao)";
        return $this->conexao->query($sql);
    }

    public function selectAll() {
        $sql = "SELECT * FROM promocoes";
        $result = $this->conexao->query($sql);
        $promocoes = [];

        while ($row = $result->fetch_assoc()) {
            $promocoes[] = $row;
        }

        return $promocoes;
    }

    public function selectById($id) {
        $sql = "SELECT * FROM promocoes WHERE id=$id";
        $result = $this->conexao->query($sql);
        return $result->fetch_assoc();
    }

    public function update($id, $nome, $preco, $descricao, $qtd_gb_armazenamento, $tempo_duracao) {
        $nome = $this->conexao->real_escape_string($nome);
        $descricao = $this->conexao->real_escape_string($descricao);

        $sql = "UPDATE promocoes 
                SET nome='$nome', preco=$preco, descricao='$descricao', 
                qtd_gb_armazenamento=$qtd_gb_armazenamento, tempo_duracao=$tempo_duracao 
                WHERE id=$id";
        return $this->conexao->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM promocoes WHERE id=$id";
        return $this->conexao->query($sql);
    }
}
?>
