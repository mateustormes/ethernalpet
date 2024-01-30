<?php include('sideMenu.php'); ?>
<div class="container mt-5">
    <h2 class="mb-4">Lista de Usuários</h2>

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
                <p>Escaneie o QR Code abaixo para efetuar o pagamento:</p>
                <img id="qrCodeImg" src="" alt="QR Code Pix">
                <p>Ou utilize o metodo abaixo: </p>
                <p>00020126330014BR.GOV.BCB.PIX01114500618180052040000530398654040.015802BR5924Mateus Tormes Gervazioni6009SAO PAULO621405101t2InnFpVl630464E8</p>
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
        // ... (código anterior)

        // Crie o QR Code com os dados do Pix
        var qrCodeData = "00020126330014BR.GOV.BCB.PIX01114500618180052040000530398654040.015802BR5924Mateus Tormes Gervazioni6009SAO PAULO621405101t2InnFpVl630464E8";
        qrCodeData += "62070502" + idPromocao.toString().padStart(2, '0') + "530398654040" + preco.toString().padStart(11, '0') + "6304";

        // Atualize a imagem do QR Code na modal
        document.getElementById('qrCodeImg').src = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' + encodeURIComponent(qrCodeData);

        // Abra a modal
        $('#comprarModal').modal('show');

        // Inicialize a QuaggaJS
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                constraints: {
                    width: 640,
                    height: 480,
                    facingMode: "environment"
                },
            },
            decoder: {
                readers: ["code_128_reader"]
            },
        }, function (err) {
            if (err) {
                console.error(err);
                return;
            }
            Quagga.start();
        });

        // Adicione um ouvinte para processar o código escaneado
        Quagga.onDetected(function (result) {
            // Resultado do escaneamento
            var code = result.codeResult.code;

            // Faça algo com o código escaneado (por exemplo, enviar para o backend para verificação)
            console.log("Código escaneado:", code);

            // Pare a QuaggaJS após escanear um código (opcional)
            Quagga.stop();
        });
    }
</script>



<?php include('footerPage.php'); ?>