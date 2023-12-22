<?php
require_once 'Conexao.php';

class Usuarios {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function insert($nome, $fk_empresa, $email, $senha) {
        $sql = "INSERT INTO usuarios (nome, fk_empresa, email, senha) VALUES ('$nome', $fk_empresa, '$email', '$senha')";
        echo $sql;
        return $this->conexao->query($sql);
    }

    public function selectAll() {
        $sql = "SELECT * FROM usuarios";
        $result = $this->conexao->query($sql);
        $usuarios = [];

        while ($row = $result->fetch_assoc()) {
            $usuarios[] = $row;
        }

        return $usuarios;
    }

    public function selectAllByEmail($email) {
        $email = $this->conexao->real_escape_string($email);
        $sql = "SELECT * FROM usuarios WHERE email='$email'";
        $result = $this->conexao->query($sql);
        return $result->fetch_assoc();
    }

    public function selectById($id) {
        $sql = "SELECT * FROM usuarios WHERE id=$id";
        $result = $this->conexao->query($sql);
        return $result->fetch_assoc();
    }

    public function update($id_usuario, $nome, $email, $admin) {
        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', administrador = $admin WHERE id = $id_usuario";
    
        return $this->conexao->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM usuarios WHERE id=$id";
        return $this->conexao->query($sql);
    }
}
?>
