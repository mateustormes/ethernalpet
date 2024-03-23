<?php session_start(); include('sideMenu.php'); 
?>
<div class="container mt-5">
    <h2 class="mb-4">Opções de Pagamentos</h2>

       <!-- Pricing Plan Start -->
       <div class="container-fluid bg-light pt-5 pb-4">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h1 class="display-4 m-0">Escolha os <span class="text-primary">melhores preços</span></h1>
            </div>
            <div class="row">
                <?php
                require_once 'backend/Promocoes.php';
                $promocoes = new Promocoes();
                $promocoesLists = $promocoes->selectAll();
                $cont = 1;
                foreach ($promocoesLists as $promoc):
                    $str = "img/price-".$cont.".jpg";
                ?>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0">
                        <div class="card-header position-relative border-0 p-0 mb-4">
                            <img class="card-img-top" src="<?=  $str; ?>" alt="">
                            <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                                <h3 class="text-primary mb-3"><?= $promoc['nome']; ?></h3>
                                <h1 class="display-4 text-white mb-0">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small><?= $promoc['preco']; ?><small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                                </h1>
                            </div>
                        </div>
                        <div class="card-body text-center p-0">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Armazenamento: <?= $promoc['qtd_gb_armazenamento']; ?></li>
                                <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Dias: <?= $promoc['tempo_duracao']; ?></li>
                            </ul>
                        </div>
                        <div class="card-footer border-0 p-0">
                            <?php if($cont%2==0){ ?>
                                <a href="javascript:void(0);" onclick="abrirModal(<?= $promoc['id']; ?>, <?= $promoc['preco']; ?>)" class="btn btn-secondary btn-block p-3" style="border-radius: 0;">Comprar</a>
                            <?php }else{ ?>
                                <a href="javascript:void(0);" onclick="abrirModal(<?= $promoc['id']; ?>, <?= $promoc['preco']; ?>)" class="btn btn-primary btn-block p-3" style="border-radius: 0;">Comprar</a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <?php 
                $cont++;
                endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->
</div>
<!-- Modal -->
<div class="modal fade" id="comprarModal" tabindex="-1" role="dialog" aria-labelledby="comprarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comprarModalLabel">Efetuar Pagamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
            <?php

// Chave PIX fornecida
$chavePix = "00020126330014BR.GOV.BCB.PIX01114500618180052040000530398654040.015802BR5924Mateus Tormes Gervazioni6009SAO PAULO61080540900062250521ZH2uDFf19hGEk7Z1esl8o6304DBF9";

// URL da API goqr.me para gerar QR Code
$apiUrl = "https://api.qrserver.com/v1/create-qr-code/";

// Parâmetros da requisição
$params = [
    'size' => '300x300', // Tamanho do QR Code
    'data' => $chavePix, // Dados a serem codificados no QR Code
];

// Construa a URL completa
$fullUrl = $apiUrl . '?' . http_build_query($params);

// Exiba o QR Code
echo '<img src="' . $fullUrl . '" alt="QR Code PIX">';

?>


                <p>Escaneie o QR Code abaixo para efetuar o pagamento:</p>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.rawgit.com/serratus/quaggaJS/0.12.1/dist/quagga.min.js"></script>

<script>
    function abrirModal(idPromocao, preco) {
        // Abra a modal
        $('#comprarModal').modal('show');
    }
</script>



<?php include('footerPage.php'); ?>