<?php include('sideMenu.php'); ?>


<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Exibir no Menu</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <h2 class="mb-4">Lista de Categorias</h2>

                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#cadastroCategoriaModal">Cadastrar</button>

                <?php
                require_once 'backend/Categorias.php';
                $categorias = new Categoria();
                $categoriasList = $categorias->selectAll();

                foreach ($categoriasList as $categoria) {
                    echo '<tr>';
                    echo '<td>' . $categoria['id'] . '</td>';
                    echo '<td>' . $categoria['nome'] . '</td>';
                    echo '<td>' . ($categoria['display_on_menu'] == 'S' ? 'Sim' : 'Não') . '</td>';
                    echo '<td>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoCategoriaModal"
                                    data-categoria-nome="' . $categoria['nome'] . '"
                                    data-categoria-display="' . ($categoria['display_on_menu'] == 'S' ? 'Sim' : 'Não') . '">Info</button>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarCategoriaModal"
                                    data-cat-id="' . $categoria['id'] . '"
                                    data-categoria-nome="' . $categoria['nome'] . '"
                                    data-categoria-display="' . ($categoria['display_on_menu'] == 'S' ? 'Sim' : 'Não') . '">Editar</button>
                                
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removerCategoriaModal" data-cat-id="' . $categoria['id'] . '">Remover</button>
                        </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de Cadastro de Categoria -->
<div class="modal fade" id="cadastroCategoriaModal" tabindex="-1" role="dialog" aria-labelledby="cadastroCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroCategoriaModalLabel">Cadastrar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulário de cadastro de categoria -->
                <form action="processar/cadastrar_categoria.php" method="post">
                    <!-- Campos do formulário -->
                    <label>Informe o nome da categoria:</label><br>
                    <input type="text" name="nome" placeholder="Nome" required>
                    <div class="form-group">
                        <label for="displayOnMenuCheckbox">Exibir no Menu:</label><br>
                        <input type="checkbox" id="displayOnMenuCheckbox" name="display_on_menu" value="S" checked>
                    </div>
                    <!-- Adicione outros campos conforme necessário -->

                    <!-- Botão de enviar -->
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Informações de Categoria -->
<div class="modal fade" id="infoCategoriaModal" tabindex="-1" role="dialog" aria-labelledby="infoCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoCategoriaModalLabel">Informações da Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Adicione aqui as informações da categoria -->
                <!-- Exemplo: -->
                <p>Nome: <span id="infoCategoria-nome"></span></p>
                <p>Exibir no Menu: <span id="infoCategoria-display"></span></p>
                <!-- Adicione outras informações conforme necessário -->
            </div>
        </div>
    </div>
</div>

<!-- Modal de Edição de Categoria -->
<div class="modal fade" id="editarCategoriaModal" tabindex="-1" role="dialog" aria-labelledby="editarCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarCategoriaModalLabel">Editar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Adicione aqui o formulário de edição de categoria -->
                <!-- Exemplo: -->
                <form action="processar/editar_categoria.php" method="post">
                    <!-- Campo oculto para armazenar o id_categoria -->
                    <input type="hidden" name="id_categoria" id="editarCategoria-id" value="">
                    <!-- Campo oculto para armazenar o valor atual de display_on_menu -->
                    <input type="hidden" name="display_on_menu" id="editarCategoria-display" value="">

                    <label>Informe o nome da categoria:</label><br>
                    <input type="text" name="nome" id="editarCategoria-nome" required>
                    <div class="form-group">
                        <label for="editarCategoriaDisplayCheckbox">Exibir no Menu:</label><br>
                        <input type="checkbox" id="editarCategoriaDisplayCheckbox" name="display_on_menu" value="S">
                    </div>
                    <!-- Adicione outros campos conforme necessário -->

                    <!-- Botão de enviar -->
                    <button type="submit" class="btn btn-primary">Salvar Edições</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal de Remoção de Categoria -->
<div class="modal fade" id="removerCategoriaModal" tabindex="-1" role="dialog" aria-labelledby="removerCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removerCategoriaModalLabel">Remover Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja remover esta categoria?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <!-- Redirecionamento para a página de remoção de categoria -->
                <a href="#" class="btn btn-danger" id="removerCategoriaLink">Remover</a>
            </div>
        </div>
    </div>
</div>
<!-- Scripts JavaScript (Bootstrap e menu lateral) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Scripts JavaScript específicos para a página de categorias -->
<script>
    $(document).ready(function () {
        // Evento disparado quando o modal de informações é exibido
        $("#infoCategoriaModal").on("show.bs.modal", function (event) {
            // Referência ao botão que disparou o modal
            var button = $(event.relatedTarget);

            // Extração dos dados do atributo data
            var nome = button.data("categoria-nome");
            var display = button.data("categoria-display");

            // Atualização dos campos no modal
            $("#infoCategoria-nome").text(nome);
            $("#infoCategoria-display").text(display);
        });

        // Evento disparado quando o formulário de edição é enviado
        $("#editarCategoriaModal form").submit(function () {
            // Verifica se o checkbox está marcado
            var displayCheckbox = $("#editarCategoriaDisplayCheckbox");
            var displayValue = displayCheckbox.prop("checked") ? "S" : "N";

            // Atribui o valor ajustado ao campo oculto
            $("#editarCategoria-display").val(displayValue);
        });

        // Evento disparado quando o modal de edição é exibido
        $("#editarCategoriaModal").on("show.bs.modal", function (event) {
            // Referência ao botão que disparou o modal
            var button = $(event.relatedTarget);

            // Extração dos dados do atributo data
            var id_categoria = button.data("cat-id");
            var nome = button.data("categoria-nome");
            var display = button.data("categoria-display");

            // Atualização dos campos no formulário de edição
            $("#editarCategoria-id").val(id_categoria);
            $("#editarCategoria-nome").val(nome);
            $("#editarCategoria-display").val(display);
            $("#editarCategoriaDisplayCheckbox").prop("checked", display === "Sim");
        });

        $("#removerCategoriaModal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget);
            var categoriaId = button.data("cat-id");
            var linkRemover = $("#removerCategoriaLink");
            linkRemover.attr("href", "processar/remover_categoria.php?id_categoria=" + categoriaId);
        });
    });
</script>
<?php include('footerPage.php'); ?>