<?php
require_once 'Conexao.php';

class Pagamentos {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function insert($fk_usuario, $fk_promocoes, $dt_realizada_compra, $dt_expiracao) {
        $fk_usuario = $this->conexao->real_escape_string($fk_usuario);
        $fk_promocoes = $this->conexao->real_escape_string($fk_promocoes);
        $dt_realizada_compra = $this->conexao->real_escape_string($dt_realizada_compra);
        $dt_expiracao = $this->conexao->real_escape_string($dt_expiracao);

        $sql = "INSERT INTO pagamentos (fk_usuario, fk_promocoes, dt_realizada_compra, dt_expiracao) VALUES ('$fk_usuario', '$fk_promocoes', '$dt_realizada_compra', '$dt_expiracao')";
        return $this->conexao->query($sql);
    }

    public function selectAll() {
        $sql = "SELECT * FROM pagamentos";
        $result = $this->conexao->query($sql);
        $pagamentos = [];

        while ($row = $result->fetch_assoc()) {
            $pagamentos[] = $row;
        }

        return $pagamentos;
    }

    public function selectById($id) {
        $sql = "SELECT * FROM pagamentos WHERE id=$id";
        $result = $this->conexao->query($sql);
        return $result->fetch_assoc();
    }

    public function update($id, $fk_usuario, $fk_promocoes, $dt_realizada_compra, $dt_expiracao) {
        $fk_usuario = $this->conexao->real_escape_string($fk_usuario);
        $fk_promocoes = $this->conexao->real_escape_string($fk_promocoes);
        $dt_realizada_compra = $this->conexao->real_escape_string($dt_realizada_compra);
        $dt_expiracao = $this->conexao->real_escape_string($dt_expiracao);

        $sql = "UPDATE pagamentos SET fk_usuario='$fk_usuario', fk_promocoes='$fk_promocoes', dt_realizada_compra='$dt_realizada_compra', dt_expiracao='$dt_expiracao' WHERE id=$id";
        return $this->conexao->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM pagamentos WHERE id=$id";
        return $this->conexao->query($sql);
    }
}
?>
