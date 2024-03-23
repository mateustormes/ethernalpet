<?php
// Verifica se o parâmetro id_recibo foi passado na URL
if (isset($_GET['id_recibo'])) {
    $id_recibo = $_GET['id_recibo'];

    // Consulta ao banco de dados para obter o URL da imagem com base no ID do recibo
    require_once '../backend/Recibo.php';
    $recibo = new Recibo();
    $reciboData = $recibo->getReciboById($id_recibo);

    if ($reciboData) {
        // Exibe a imagem
        
        $imagem_base64 = base64_encode($reciboData['foto_recibo']);
        echo '<img src="data:image/*;base64,' . $imagem_base64 . '" alt="Imagem do Item" >';
                    
        // echo '<img src="data:image/*;base64' . $reciboData['foto_recibo'] . '" alt="Recibo">';
    } else {
        echo 'Recibo não encontrado.';
    }
} else {
    echo 'ID do recibo não especificado na URL.';
}
?>
