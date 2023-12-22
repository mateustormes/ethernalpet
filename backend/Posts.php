<?php
require_once 'Conexao.php';

class Posts {
    public $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function insert($nome_post, $dt_user, $cd_user, $fk_categoria, $imagem) {
        $img = $this->conexao->real_escape_string($imagem); // Evita SQL injection
        $sql = "INSERT INTO posts (nome_post, dt_user, cd_user, fk_categoria, img) VALUES ('$nome_post', '$dt_user', $cd_user, $fk_categoria, '$img')";
        // echo $sql;
        return $this->conexao->query($sql);
    }

    public function selectAll() {
        $sql = "SELECT * FROM posts";
        $result = $this->conexao->query($sql);
        $posts = [];

        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }

        return $posts;
    }

    public function selectPostsItensPostAll($categoriaId) {
        $sql = "SELECT posts.id as post_id, posts.nome_post, posts.dt_user, usuarios.nome as nome_usuario, 
                       itens_post.item, itens_post.nome_pet, itens_post.informacoes_pet
                FROM posts
                INNER JOIN usuarios ON posts.cd_user = usuarios.id
                INNER JOIN itens_post ON posts.id = itens_post.fk_post
                WHERE posts.fk_categoria =$categoriaId";
        
        $result = $this->conexao->query($sql);
        $posts = [];

        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }

        return $posts;
    }

    public function selectById($id) {
        $sql = "SELECT * FROM posts WHERE id=$id";
        $result = $this->conexao->query($sql);
        return $result->fetch_assoc();
    }

    public function update($id, $nome_post) {
        $sql = "UPDATE posts SET nome_post='$nome_post' WHERE id=$id";
        return $this->conexao->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM posts WHERE id=$id";
        return $this->conexao->query($sql);
    }
}
?>
