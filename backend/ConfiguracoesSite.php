<?php
require_once 'Conexao.php';

class ConfiguracoesSite {
    public $conexao;

    public function __construct() {
        $this->conexao = (new Conexao())->getConexao();
    }

    public function selectAll() {
        $sql = "SELECT * FROM configuracoes_site";
    
        $result = $this->conexao->query($sql);
        
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return null; // ou outra indicação de erro, conforme necessário
        }
    }
    
}
?>
