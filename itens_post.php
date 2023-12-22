<?php include('sideMenu.php'); ?>

<div class="container mt-5">
    <h2 class="mb-4">Lista de Itens do Post</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#cadastroItemModal">Cadastrar</button>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID do Post</th>
                    <th>Item</th>
                    <th>Nome do Pet</th>
                    <th>Informações do Pet</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Adicione as linhas da tabela com PHP -->
                <?php
                require_once 'backend/ItensPost.php'; // Certifique-se de ter a classe correta para a nova tabela
                $itensPost = new ItensPost(); // Substitua 'ItensPost' pela classe correta
                $itensList = $itensPost->getItensByPost($_GET['id_post']); // Substitua 'selectAll' pelo método correto
                
                foreach ($itensList as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['id'] . '</td>';
                    echo '<td>' . $item['fk_post'] . '</td>';
                    echo '<td>';
                    $imagem_base64 = base64_encode($item['item']);
                    // Exibe a tag de imagem
                    echo '<img src="data:image/*;base64,' . $imagem_base64 . '" alt="Imagem do Item" style="max-width: 100px; max-height: 100px;">';
                    echo '</td>';
                    echo '<td>' . $item['nome_pet'] . '</td>';
                    echo '<td>' . $item['informacoes_pet'] . '</td>';
                    echo '<td>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoItemModal"
                                    data-item-pet="' . $item['nome_pet'] . '"
                                    data-item-info="' . $item['informacoes_pet'] . '">Info</button>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarItemModal"
                                    data-item-id="' . $item['id'] . '"
                                    data-item-pet="' . $item['nome_pet'] . '"
                                    data-item-info="' . $item['informacoes_pet'] . '">Editar</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removerItemModal" data-item-id="'.$item['id'].'">Remover</button>
                        </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de Cadastro de Item -->
<div class="modal fade" id="cadastroItemModal" tabindex="-1" role="dialog" aria-labelledby="cadastroItemModalLabel" aria-hidden="true">
    <!-- Adicione o conteúdo do modal de cadastro de item -->
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroItemModalLabel">Cadastrar Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulário de cadastro de item -->
                <form action="processar/cadastrar_item.php" method="post" enctype="multipart/form-data">
                    <!-- Campos do formulário -->
                    <input type="hidden" name="fk_post" value="<?php echo $_GET['id_post']; ?>">
                    <label>Imagem</label>
                    <input type="file" name="imagem" accept="image/*" required><br>
                    <label>Nome do Pet</label>
                    <input type="text" name="nome_pet" placeholder="Nome do Pet" required><br>
                    <label>Informações do Pet</label>
                    <textarea name="informacoes_pet" placeholder="Informações do Pet" required></textarea><br>
                    <!-- Adicione outros campos conforme necessário -->

                    <!-- Botão de enviar -->
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>

            </div>
        </div>
    </div>

</div>

<!-- Modal de Informações de Item -->
<div class="modal fade" id="infoItemModal" tabindex="-1" role="dialog" aria-labelledby="infoItemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoItemModalLabel">Informações do Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Adicione aqui as informações do item -->
                <p>Nome do Item: <span id="infoItem-nome"></span></p>
                <p>Nome do Pet: <span id="infoItem-pet"></span></p>
                <p>Informações do Pet: <span id="infoItem-info"></span></p>
                <!-- Adicione outras informações conforme necessário -->
            </div>
        </div>
    </div>

</div>

<!-- Modal de Edição de Item -->
<div class="modal fade" id="editarItemModal" tabindex="-1" role="dialog" aria-labelledby="editarItemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarItemModalLabel">Editar Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="processar/editar_item.php" method="post"  enctype="multipart/form-data">
                    <!-- Adicione um campo oculto para armazenar o id_item -->
                    <input type="hidden" name="id_item" id="editarItem-id" value="">

                    <!-- Campos do formulário preenchidos com os dados do item -->
                    <label>Imagem</label>
                    <input type="file" name="imagem" accept="image/*" required><br>
                    <label>Nome do Pet</label>
                    <input type="text" name="nome_pet" id="editarItem-pet" required><br>
                    <label>Informações do Pet</label>
                    <textarea name="informacoes_pet" id="editarItem-info" required></textarea><br>
                    <!-- Adicione outros campos conforme necessário -->

                    <!-- Botão de enviar -->
                    <button type="submit" class="btn btn-primary">Salvar Edições</button>
                </form>
            </div>
        </div>
    </div>

</div>

<!-- Modal de Remoção de Item -->
<div class="modal fade" id="removerItemModal" tabindex="-1" role="dialog" aria-labelledby="removerItemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removerItemModalLabel">Remover Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja remover este item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <!-- Redirecionamento para a página de remoção de item -->
                <a href="#" class="btn btn-danger" id="removerItemLink">Remover</a>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        // Evento disparado quando o modal de informações é exibido
        $("#infoItemModal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget);
            var nome = button.data("item-nome");
            var pet = button.data("item-pet");
            var info = button.data("item-info");

            $("#infoItem-nome").text(nome);
            $("#infoItem-pet").text(pet);
            $("#infoItem-info").text(info);
        });

        // Evento disparado quando o modal de edição é exibido
        $("#editarItemModal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget);
            var idItem = button.data("item-id");
            var nome = button.data("item-nome");
            var pet = button.data("item-pet");
            var info = button.data("item-info");

            $("#editarItem-id").val(idItem);
            $("#editarItem-nome").val(nome);
            $("#editarItem-pet").val(pet);
            $("#editarItem-info").val(info);
        });

        // Evento disparado quando o modal de remoção é exibido
        $("#removerItemModal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget);
            var itemId = button.data("item-id");
            var linkRemoverItem = $("#removerItemLink");
            linkRemoverItem.attr("href", "processar/remover_item.php?id_item=" + itemId);
        });
    });
</script>


<?php include('footerPage.php'); ?>
