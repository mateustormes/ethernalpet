<?php include('sideMenu.php'); ?>


<div class="container mt-5">
    <h2 class="mb-4">Lista de Posts</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#cadastroPostModal">Cadastrar</button>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nome do Post</th>
                    <th>Data de Criação</th>
                    <th>Código do Usuário</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Adicione as linhas da tabela com PHP -->
                <?php
                require_once 'backend/Posts.php';
                $posts = new Posts();
                if($_SESSION['admin'] == 'S'){                    
                    $postsList = $posts->selectAll();
                }else{
                    $postsList = $posts->selectByCdUser($_SESSION['id_usuario']);
                }
                if(count($postsList) > 0 ){
                    foreach ($postsList as $post) {
                        
                        $imagem_base64 = base64_encode($post['img']);
                        echo '<tr>';                    
                        echo '<td>' . $post['id'] . '</td>';
                        echo '<td>';
                        echo '<img src="data:image/*;base64,' . $imagem_base64 . '" alt="Imagem do Item" style="max-width: 100px; max-height: 100px;">';
                        echo '</td>';
                        echo '<td>' . $post['nome_post'] . '</td>';
                        echo '<td>' . $post['dt_user'] . '</td>';
                        echo '<td>' . $post['cd_user'] . '</td>';
                        echo '<td>' . $post['fk_categoria'] . '</td>';
                        echo '<td>
                                <button class="btn btn-success btn-sm" onclick="visualizarItensPost(' . $post['id'] . ')">Visualizar Itens Post</button>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#infoPostModal"
                                        data-post-nome="' . $post['nome_post'] . '"
                                        data-post-data="' . $post['dt_user'] . '"
                                        data-post-codigo="' . $post['cd_user'] . '"
                                        data-post-categoria="' . $post['fk_categoria'] . '">Info</button>
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarPostModal"
                                        data-post-id="' . $post['id'] . '"
                                        data-post-nome="' . $post['nome_post'] . '"
                                        data-post-data="' . $post['dt_user'] . '"
                                        data-post-codigo="' . $post['cd_user'] . '"
                                        data-post-categoria="' . $post['fk_categoria'] . '">Editar</button>
                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removerPostModal" data-post-id="'.$post['id'].'">Remover</button>
                            </td>';
                        echo '</tr>';
                    }
                }else{ ?> 
                    <tr>
                        <td colspan="7" align="center">
                            <h4 class="text-secondary mb-3">Não há nenhum post realizado ainda</h4>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal de Cadastro de Post -->
<div class="modal fade" id="cadastroPostModal" tabindex="-1" role="dialog" aria-labelledby="cadastroPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroPostModalLabel">Cadastrar Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulário de cadastro de post -->
                <form action="processar/cadastrar_post.php" method="post" enctype="multipart/form-data">
                    <!-- Campos do formulário -->                    
                    <label>Código do Usuário: <?php echo $_SESSION['id_usuario']; ?></label><br>
                    <label>Informe o nome do post:</label><br>
                    <input class="col-md-12" type="text" name="nome" placeholder="Nome do Post" required><br>
                    <label>Data</label><br>
                    <input class="col-md-12" type="datetime-local" name="data" id="data" required><br>
                    <script>
                    // Obtém a data e hora atual
                    var dataAtual = new Date();

                    // Formata a data e hora atual para o formato esperado pelo input datetime-local
                    var dataFormatada = dataAtual.getFullYear() + '-' + ('0' + (dataAtual.getMonth() + 1)).slice(-2) + '-' + ('0' + dataAtual.getDate()).slice(-2) + 'T' + ('0' + dataAtual.getHours()).slice(-2) + ':' + ('0' + dataAtual.getMinutes()).slice(-2);

                    // Define o valor do campo datetime-local como a data e hora atual formatada
                    document.getElementById('data').value = dataFormatada;
                    </script>
                    <input style="display:none;" class="col-md-12" type="number" name="codigo" placeholder="Código do Usuário" required value="<?php echo $_SESSION['id_usuario']; ?>">
                    <label>Código de Categoria</label><br>
                    <?php
                    require_once 'backend/Categorias.php';

                    // Instanciando o objeto Categoria
                    $categoria = new Categoria();

                    // Obtendo todas as categorias
                    $categorias = $categoria->selectAllWhereDisplay();
                    ?>

                    <select class="col-md-12" name="categoria" required>
                        <option value="" disabled selected>Selecione a Categoria</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- Adicione outros campos conforme necessário -->
                    <label>Imagem</label><br>
                    <input class="col-md-12" type="file" name="imagem" accept="image/*" required><br>
                    <!-- Botão de enviar --><br>
                    <center>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Informações de Post -->
<div class="modal fade" id="infoPostModal" tabindex="-1" role="dialog" aria-labelledby="infoPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoPostModalLabel">Informações do Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Adicione aqui as informações do post -->
                <!-- Exemplo: -->
                <p>Nome do Post: <span id="infoPost-nome"></span></p>
                <p>Data de Criação: <span id="infoPost-data"></span></p>
                <p>Código do Usuário: <span id="infoPost-codigo"></span></p>
                <p>Categoria: <span id="infoPost-categoria"></span></p>
                <!-- Adicione outras informações conforme necessário -->
            </div>
        </div>
    </div>
</div>


<!-- Modal de Edição de Post -->
<div class="modal fade" id="editarPostModal" tabindex="-1" role="dialog" aria-labelledby="editarPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarPostModalLabel">Editar Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="processar/editar_post.php" method="post">
                    <!-- Adicione um campo oculto para armazenar o id_post -->
                    <input type="hidden" name="id_post" id="editarPost-id" value="">

                    <label>Informe o nome do post:</label><br>
                    <input class="col-md-12" type="text" name="nome_post" id="editarPost-nome" required><br>
                    <label>Data</label><br>
                    <input class="col-md-12" type="datetime-local" name="dt_user" id="editarPost-data" required><br>
                    <label>Código do Usuário: <?php echo $_SESSION['id_usuario']; ?></label><br>
                    <input style="display:none;" class="col-md-12" type="number" name="cd_user" id="editarPost-codigo" required>
                    <label>Código de Categoria</label><br>
                    <?php
                    require_once 'backend/Categorias.php';

                    // Instanciando o objeto Categoria
                    $categoria = new Categoria();

                    // Obtendo todas as categorias
                    $categorias = $categoria->selectAllWhereDisplay();
                    ?>

                    <select class="col-md-12" name="categoria" required>
                        <option value="" disabled selected>Selecione a Categoria</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['nome']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- Adicione outros campos conforme necessário -->

                    <br>
                    <center>
                        <button type="submit" class="btn btn-primary">Salvar Edições</button>
                    </center>
                </form>

            </div>
        </div>
    </div>
</div>


<!-- Modal de Remoção de Post -->
<div class="modal fade" id="removerPostModal" tabindex="-1" role="dialog" aria-labelledby="removerPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removerPostModalLabel">Remover Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza de que deseja remover este post?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <!-- Redirecionamento para a página de remoção de post -->
                <a href="#" class="btn btn-danger" id="removerPostLink">Remover</a>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Scripts JavaScript específicos para a página de posts -->
<script>
    $(document).ready(function () {
        // Evento disparado quando o modal de informações é exibido
        $("#infoPostModal").on("show.bs.modal", function (event) {
            // Referência ao botão que disparou o modal
            var button = $(event.relatedTarget);

            // Extração dos dados do atributo data
            var nome = button.data("post-nome");
            var data = button.data("post-data");
            var codigo = button.data("post-codigo");
            var categoria = button.data("post-categoria");

            // Atualização dos campos no modal
            $("#infoPost-nome").text(nome);
            $("#infoPost-data").text(data);
            $("#infoPost-codigo").text(codigo);
            $("#infoPost-categoria").text(categoria);
        });

        // Evento disparado quando o modal de edição é exibido
        $("#editarPostModal").on("show.bs.modal", function (event) {
            // Referência ao botão que disparou o modal
            var button = $(event.relatedTarget);

            // Extração dos dados do atributo data
            var idPost = button.data("post-id");
            var nome = button.data("post-nome");
            var data = button.data("post-data");
            var codigo = button.data("post-codigo");
            var categoria = button.data("post-categoria");

            // Atualização dos campos no formulário de edição
            $("#editarPost-id").val(idPost);
            $("#editarPost-nome").val(nome);
            $("#editarPost-data").val(data);
            $("#editarPost-codigo").val(codigo);
            $("#editarPost-categoria").val(categoria);
        });


        // Evento disparado quando o modal de remoção é exibido
        $("#removerPostModal").on("show.bs.modal", function (event) {
            var button = $(event.relatedTarget);
            var postId = button.data("post-id");
            var linkRemover = $("#removerPostLink");
            linkRemover.attr("href", "processar/remover_post.php?id_post=" + postId);
        });
    });
    function visualizarItensPost(idPost) {
        window.location.href = 'itens_post.php?id_post=' + idPost;
    }
</script>

<?php include('footerPage.php'); ?>