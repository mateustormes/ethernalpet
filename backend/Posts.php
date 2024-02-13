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

    public function selectByCdUser($cd_user) {
        $sql = "SELECT * FROM posts WHERE cd_user = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bind_param("i", $cd_user);
        $stmt->execute();
    
        $result = $stmt->get_result();
        $posts = [];
    
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    
        return $posts;
    }
    

    public function selectAllByFkCategoria($fk_categoria) {
        $sql = "SELECT count(id) qtd FROM posts WHERE fk_categoria = $fk_categoria";
        $result = $this->conexao->query($sql);
        return $result->fetch_assoc();
    }

    public function selectPostsItensPostAll($categoriaId) {
        $sql = "SELECT posts.id as post_id, posts.nome_post, posts.dt_user, usuarios.nome as nome_usuario, posts.img as item,
                COUNT(DISTINCT comentarios_post.id) as numero_comentarios,
                COUNT(DISTINCT itens_post.id) as numero_itens_post
                FROM posts
                INNER JOIN usuarios ON posts.cd_user = usuarios.id
                LEFT JOIN comentarios_post ON posts.id = comentarios_post.fk_post
                LEFT JOIN itens_post ON posts.id = itens_post.fk_post
                WHERE posts.fk_categoria = $categoriaId
                GROUP BY posts.id";
    
        $result = $this->conexao->query($sql);
        $posts = [];
    
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    
        return $posts;
    }
    
    
    

    public function selectById($id) {
        $sql = "SELECT po.*, itp.informacoes_pet infpet, itp.nome_pet nome_pet, itp.item foto_item_pet FROM posts po, itens_post itp WHERE po.id=$id AND po.id = itp.fk_post";
        $result = $this->conexao->query($sql);
        $posts = [];

        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }

        return $posts;
    }

    public function selectByIdNoJoin($id) {
        $sql = "SELECT * FROM posts WHERE id = $id";
        $result = $this->conexao->query($sql);
        $posts = [];

        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }

        return $posts;
    }
    public function selectRecentPosts($limit = 8) {
        $sql = "SELECT posts.*, categoria.nome as nome_categoria, COUNT(comentarios_post.id) as numero_comentarios 
                FROM posts 
                LEFT JOIN categoria ON posts.fk_categoria = categoria.id
                LEFT JOIN comentarios_post ON posts.id = comentarios_post.fk_post
                GROUP BY posts.id 
                ORDER BY posts.dt_user DESC 
                LIMIT $limit";
        
        $result = $this->conexao->query($sql);
    
        if (!$result) {
            die('Error executing query: ' . $this->conexao->error);
        }
    
        $posts = [];
    
        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }
    
        return $posts;
    }
    
    
    

    public function update($id, $nome_post, $dt_user, $cd_user, $fk_categoria) {
        $sql = "UPDATE posts SET nome_post='$nome_post', dt_user='$dt_user', cd_user='$cd_user', fk_categoria='$fk_categoria' WHERE id=$id";
        return $this->conexao->query($sql);
    }    

    public function delete($id) {
        $sql = "DELETE FROM posts WHERE id=$id";
        return $this->conexao->query($sql);
    }
}
?>
