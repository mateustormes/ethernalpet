<?php
require_once 'Conexao.php';

class Contato {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function insert($name, $email, $subject, $message) {
        $name = $this->conexao->real_escape_string($name);
        $email = $this->conexao->real_escape_string($email);
        $subject = $this->conexao->real_escape_string($subject);
        $message = $this->conexao->real_escape_string($message);

        $sql = "INSERT INTO contato (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
        return $this->conexao->query($sql);
    }

    public function selectAll() {
        $sql = "SELECT * FROM contato";
        $result = $this->conexao->query($sql);
        $contatos = [];

        while ($row = $result->fetch_assoc()) {
            $contatos[] = $row;
        }

        return $contatos;
    }

    public function selectById($id) {
        $sql = "SELECT * FROM contato WHERE id=$id";
        $result = $this->conexao->query($sql);
        return $result->fetch_assoc();
    }

    public function update($id, $name, $email, $subject, $message) {
        $name = $this->conexao->real_escape_string($name);
        $email = $this->conexao->real_escape_string($email);
        $subject = $this->conexao->real_escape_string($subject);
        $message = $this->conexao->real_escape_string($message);

        $sql = "UPDATE contato SET name='$name', email='$email', subject='$subject', message='$message' WHERE id=$id";
        return $this->conexao->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM contato WHERE id=$id";
        return $this->conexao->query($sql);
    }
}
?>
