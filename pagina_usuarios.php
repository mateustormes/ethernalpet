<?php include('sideMenu.php'); ?>
<div class="container mt-5">
    <h2 class="mb-4">Lista de Usuários</h2>
    <?php if($_SESSION['admin'] == 'S'){ ?>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#cadastroModal">Cadastrar</button>
    <?php } ?>
    <!-- Tabela Responsiva -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Administrador</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aqui você deve inserir as linhas da tabela com PHP -->
                <?php
                require_once 'backend/Usuarios.php';
                $usuarios = new Usuarios();

                if($_SESSION['admin'] == 'S'){                    
                    $usuariosList = $usuarios->selectAll();
                }else{
                    $usuariosList = $usuarios->selectByUserId($_SESSION['id_usuario']);
                }
                if(count($usuariosList) > 0 ){
                    foreach ($usuariosList as $usuario) {
                        echo '<tr>';
                        echo '<td>' . $usuario['id'] . '</td>';
                        echo '<td>' . $usuario['nome'] . '</td>';
                        echo '<td>' . $usuario['email'] . '</td>';
                        echo '<td>' . ($usuario['administrador'] == 'S' ? 'Sim' : 'Não') . '</td>';
                        echo '<td>
                                <button onclick="showInfo(' . $usuario['id'].','.$usuario['nome'].','.$usuario['email'] . ')" class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoModal" 
                                        data-user-id="' . $usuario['id'] . '" 
                                        data-user-nome="' . $usuario['nome'] . '"
                                        data-user-email="' . $usuario['email'] . '"
                                        data-user-admin="' . $usuario['administrador'] . '">Info</button>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarModal" 
                                        data-user-id="' . $usuario['id'] . '" 
                                        data-user-nome="' . $usuario['nome'] . '"
                                        data-user-email="' . $usuario['email'] . '"
                                        data-user-admin="' . $usuario['administrador'] . '">Editar</button>';
                                        
                                if($_SESSION['admin'] == 'S'){
                                    echo '<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removerModal" data-user-id="' . $usuario['id'] . '">Remover</button>';
                                }
                            echo '</td>';
                        echo '</tr>';
                    }
                }else{ ?> 
                    <tr>
                        <td colspan="7" align="center">
                            <h4 class="text-secondary mb-3">Não há nenhum usuario cadastrado.</h4>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal de Cadastro -->
<div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroModalLabel">Cadastrar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Adicione aqui o formulário de cadastro -->
                <!-- Exemplo: -->
                <form action="processar/cadastrar_usuario.php" method="post">
                    <!-- Campos do formulário -->
                    <input type="text" name="fk_empresa" placeholder="Empresa" required>
                    <input type="text" name="nome" placeholder="Nome" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="senha" placeholder="Senha" required>
                    <input type="text" name="admin" placeholder="Admin" required value="F">
                    <!-- Adicione outros campos conforme necessário -->
                    
                    <!-- Botão de enviar -->
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal de Informações -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">Informações do Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Adicione aqui as informações do usuário -->
                <!-- Exemplo: -->
                <p>Nome: <span id="info-nome"></span></p>
                <p>Email: <span id="info-email"></span></p>
                <!-- Adicione outras informações conforme necessário -->
            </div>

        </div>
    </div>
</div>

<!-- Modal de Edição -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Adicione aqui o formulário de edição -->
                <!-- Exemplo: -->
                <form action="processar/editar_usuario.php" method="post">
                    <!-- Campos do formulário preenchidos com os dados do usuário -->
                    <input type="hidden" name="id_usuario" value="<?php echo $usuario['id']; ?>">
                    
                    <label>Nome:</label><br>
                    <input type="text" name="nome" id="editar-nome" required><br>                    
                    <label>E-mail:</label><br>
                    <input type="email" name="email" id="editar-email" required><br>
                    
                    <label>Administrador: <?php if($usuario['administrador'] == 'S') { echo 'Sim';}else{ echo'Não';} ?></label><br>
                    <input style="display:none;" type="text" name="admin" id="admin" required value="<?php echo $usuario['administrador']; ?>">
                    <!-- Adicione outros campos conforme necessário -->

                    <!-- Botão de enviar -->
                    <center>
                        <button type="submit" class="btn btn-primary">Salvar Edições</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Remoção -->
<div class="modal fade" id="removerModal" tabindex="-1" role="dialog" aria-labelledby="removerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removerModalLabel">Remover Usuário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja remover este usuário?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <!-- Redirecionamento para a página de remoção -->
                <a href="#" class="btn btn-danger" id="removerUsuarioLink">Remover</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $("#infoModal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget);
            var userId = button.data("user-id");
            var nome = button.data("user-nome");
            var email = button.data("user-email");
            var admin = button.data("user-admin");

            $("#info-nome").text(nome);
            $("#info-email").text(email);
            $("#info-admin").text(admin ? "Sim" : "Não");
        });

        $("#editarModal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget);
            var userId = button.data("user-id");
            var nome = button.data("user-nome");
            var email = button.data("user-email");
            var admin = button.data("user-admin");

            $("#editar-nome").val(nome);
            $("#editar-email").val(email);
            $("#editar-admin").prop("checked", admin);
        });
        $("#removerModal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget);
            var usuarioId = button.data("user-id");
            var linkRemover = $("#removerUsuarioLink");
            linkRemover.attr("href", "processar/remover_usuario.php?id_usuario=" + usuarioId);
        });


    });
</script>
<?php include('footerPage.php'); ?>