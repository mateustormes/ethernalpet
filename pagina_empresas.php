<?php 
session_start();include('sideMenu.php');  ?>



<div class="container mt-5">
    <h2 class="mb-4">Lista de Empresas</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#cadastroEmpresaModal">Cadastrar</button>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>CNPJ</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Adicione as linhas da tabela com PHP -->
                <?php
                require_once 'backend/Empresas.php';
                $empresas = new Empresas();
                $empresasList = $empresas->selectAll();

                foreach ($empresasList as $empresa) {
                    echo '<tr>';
                    echo '<td>' . $empresa['id'] . '</td>';
                    echo '<td>' . $empresa['nome'] . '</td>';
                    echo '<td>' . $empresa['endereco'] . '</td>';
                    echo '<td>' . $empresa['cnpj'] . '</td>';
                    echo '<td>
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoEmpresaModal"
                                    data-empresa-nome="' . $empresa['nome'] . '"
                                    data-empresa-endereco="' . $empresa['endereco'] . '"
                                    data-empresa-cnpj="' . $empresa['cnpj'] . '">Info</button>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarEmpresaModal"
                                    data-empresa-id="' . $empresa['id'] . '"
                                    data-empresa-nome="' . $empresa['nome'] . '"
                                    data-empresa-endereco="' . $empresa['endereco'] . '"
                                    data-empresa-cnpj="' . $empresa['cnpj'] . '">Editar</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removerEmpresaModal" data-empresa-id="'.$empresa['id'].'">Remover</button>
                        </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal de Cadastro de Empresa -->
<div class="modal fade" id="cadastroEmpresaModal" tabindex="-1" role="dialog" aria-labelledby="cadastroEmpresaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroEmpresaModalLabel">Cadastrar Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulário de cadastro de empresa -->
                <form action="processar/cadastrar_empresa.php" method="post">
                    <!-- Campos do formulário -->
                    
                    <label>Informe o nome da sua empresa:</label><br>
                    <input class="col-md-12" type="text" name="nome" placeholder="Nome" required><br>
                    <label>Informe o endereço da empresa:</label><br>
                    <input class="col-md-12" type="text" name="endereco" placeholder="Endereço" required><br>
                    <label>Informe o CNPJ:</label><br>
                    <input class="col-md-12" type="text" name="cnpj" placeholder="CNPJ" required><br>
                    <br>
                    <center>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal de Informações de Empresa -->
<div class="modal fade" id="infoEmpresaModal" tabindex="-1" role="dialog" aria-labelledby="infoEmpresaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoEmpresaModalLabel">Informações da Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Adicione aqui as informações da empresa -->
                <!-- Exemplo: -->
                <p>Nome: <span id="infoEmpresa-nome"></span></p>
                <p>Endereço: <span id="infoEmpresa-endereco"></span></p>
                <p>CNPJ: <span id="infoEmpresa-cnpj"></span></p>
                <!-- Adicione outras informações conforme necessário -->
            </div>
        </div>
    </div>
</div>

<!-- Modal de Edição de Empresa -->
<div class="modal fade" id="editarEmpresaModal" tabindex="-1" role="dialog" aria-labelledby="editarEmpresaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarEmpresaModalLabel">Editar Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="processar/editar_empresa.php" method="post">
                    <!-- Adicione um campo oculto para armazenar o id_empresa -->
                    <input type="hidden" name="id_empresa" id="editarEmpresa-id" value="">

                    <label>Informe o nome da sua empresa:</label><br>
                    <input class="col-md-12" type="text" name="nome" id="editarEmpresa-nome" required><br>
                    <label>Informe o endereço da empresa:</label><br>
                    <input class="col-md-12" type="text" name="endereco" id="editarEmpresa-endereco" required><br>
                    <label>Informe o CNPJ:</label><br>
                    <input class="col-md-12" type="text" name="cnpj" id="editarEmpresa-cnpj" required><br>
                    <br>
                    <center>
                        <button type="submit" class="btn btn-primary">Salvar Edições</button>
                    </center>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- Modal de Remoção de Empresa -->
<div class="modal fade" id="removerEmpresaModal" tabindex="-1" role="dialog" aria-labelledby="removerEmpresaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removerEmpresaModalLabel">Remover Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Tem certeza de que deseja remover esta empresa?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            <!-- Redirecionamento para a página de remoção de empresa -->
            <a id="removerEmpresaLink" href="#" class="btn btn-danger">Remover</a>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Scripts JavaScript específicos para a página de empresas -->
<script>
    $(document).ready(function () {
        // Evento disparado quando o modal de informações é exibido
        $("#infoEmpresaModal").on("show.bs.modal", function (event) {
            // Referência ao botão que disparou o modal
            var button = $(event.relatedTarget);

            // Extração dos dados do atributo data
            var nome = button.data("empresa-nome");
            var endereco = button.data("empresa-endereco");
            var cnpj = button.data("empresa-cnpj");

            // Atualização dos campos no modal
            $("#infoEmpresa-nome").text(nome);
            $("#infoEmpresa-endereco").text(endereco);
            $("#infoEmpresa-cnpj").text(cnpj);
        });

        // Evento disparado quando o modal de edição é exibido
        $("#editarEmpresaModal").on("show.bs.modal", function (event) {
            // Referência ao botão que disparou o modal
            var button = $(event.relatedTarget);

            // Extração dos dados do atributo data
            var idEmpresa = button.data("empresa-id");
            var nome = button.data("empresa-nome");
            var endereco = button.data("empresa-endereco");
            var cnpj = button.data("empresa-cnpj");

            // Atualização dos campos no formulário de edição
            $("#editarEmpresa-id").val(idEmpresa);
            $("#editarEmpresa-nome").val(nome);
            $("#editarEmpresa-endereco").val(endereco);
            $("#editarEmpresa-cnpj").val(cnpj);
        });

        $('#removerEmpresaModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var empresaId = button.data('empresa-id');
            var link = $('#removerEmpresaLink');
            link.attr('href', 'processar/remover_empresa.php?id=' + empresaId);
        });
    });
</script>
<?php include('footerPage.php'); ?>