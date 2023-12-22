<?php
class Conexao {
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $banco = 'pet_news';
    private $conexao;

    public function __construct() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_error) {
            die('Erro na conexão com o banco de dados: ' . $this->conexao->connect_error);
        }
    }

    public function getConexao() {
        return $this->conexao;
    }
}
?>
