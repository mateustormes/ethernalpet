<?php
require_once 'Conexao.php';

class ItensPost {
    private $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function getItensByPost($postId) {
        $sql = "SELECT * FROM itens_post WHERE fk_post = $postId";
        $result = $this->conexao->query($sql);
        $itens = [];

        while ($row = $result->fetch_assoc()) {
            $itens[] = $row;
        }

        return $itens;
    }

    public function insertItem($fk_post, $item, $nome_pet, $informacoes_pet) {
        $item = $this->conexao->real_escape_string($item); // Evita SQL injection
    
        $sql = "INSERT INTO itens_post (fk_post, item, nome_pet, informacoes_pet) VALUES ('$fk_post', '$item', '$nome_pet', '$informacoes_pet')";
       
        return $this->conexao->query($sql);
    }
    

    public function updateItem($id, $item, $nome_pet, $informacoes_pet) {
        $sql = "UPDATE itens_post SET item = '$item', nome_pet = '$nome_pet', informacoes_pet = '$informacoes_pet' WHERE id = $id";
        return $this->conexao->query($sql);
    }

    public function deleteItem($id) {
        $sql = "DELETE FROM itens_post WHERE id = $id";
        return $this->conexao->query($sql);
    }
}
?>
