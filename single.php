<?php include('header_main.php'); 
require_once 'backend/Posts.php';
$posts = new Posts();
$id = $_GET['id'];

$post = $posts->selectById($id);
$itensPostEstaVazio = false;
if(count($post) == 0){
    $itensPostEstaVazio = true;
    $post = $posts->selectByIdNoJoin($id);
}
$imagem_base64 = base64_encode($post['0']['img']);

$recentPosts = $posts->selectRecentPosts();
?>


    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-4">
                    <h1 class="mb-3"><?= $post['0']['nome_post']; ?></h1>
                    <div class="d-index-flex mb-2">
                        <span class="mr-3"><i class="fa fa-user text-muted"></i> <?= $post['0']['cd_user']; ?></span>
                        <span class="mr-3"><i class="fa fa-folder text-muted"></i> <?= $post['0']['fk_categoria']; ?></span>
                        <span id ="numeroComentarios" class="mr-3"><i class="fa fa-comments text-muted"></i> 0</span>
                        <span class="mr-3"><i class="fa fa-comments text-muted"></i> <?= $post['0']['dt_user']; ?></span>
                    </div>
                </div>

                <div class="mb-5">
                    <img class="card-img-top mb-3" style="height: 200px; object-fit: cover;" src="data:image/jpeg;base64,<?= $imagem_base64; ?>" alt="">
                    <div class="row">
                        <?php foreach ($post as $item): ?>
                            <div class="col-md-6">
                                <p>
                                    <center>
                                    <b>
                                        <?php if($itensPostEstaVazio == false){ echo $item['nome_pet']; } ?>
                                    </b>
                                    </center>
                                </p>
                                <?php if($itensPostEstaVazio == false){ ?>
                                    <img class="card-img-top mb-3" style="height: 200px; object-fit: cover;" src="data:image/jpeg;base64,<?= base64_encode($item['foto_item_pet']); ?>" alt="">
                                    <p><?php echo $item['infpet']; ?></p>
                                <?php } ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


                 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                 <div class="mb-5" id="comentariosContainer">
                    <h3 class="mb-4" id="qtdComentarios">Comments</h3>
                </div>
                <!-- <div class="mb-5">
                    <h3 class="mb-4">3 Comments</h3>
                    <div class="media mb-4">
                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                        <div class="media-body">
                            <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                            <button class="btn btn-sm btn-light">Reply</button>
                        </div>
                    </div>
                    <div class="media mb-4">
                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                        <div class="media-body">
                            <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                            <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                            <button class="btn btn-sm btn-light">Reply</button>
                            <div class="media mt-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                                    <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                                    <button class="btn btn-sm btn-light">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div style="padding: 30px; background: #f6f6f6;">
                    <h3 class="mb-4">Deixe um comentário</h3>
                    <form id="comentarioForm" action="processar_comentario.php" method="post">
                    
                        <div class="form-group">
                            <input style="display:none;" type="text" class="form-control" id="id_post" name="id_post" value="<?php echo $_GET['id']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" cols="30" rows="5" class="form-control" name="message"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" value="Comentar" class="btn btn-primary px-3">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="mb-5">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Pesquisar">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mb-5">
                    <h3 class="mb-4">Categorias</h3>
                    
                    <ul class="list-group">
                    <?php 
                        require_once 'backend/Categorias.php'; // Certifique-se de que o nome do arquivo corresponda ao utilizado no backend

                        $categoriaObj = new Categoria();
                        $categorias = $categoriaObj->selectAllWhereDisplay();
                        foreach ($categorias as $categoria): 
                            $postsCat = new Posts();
                            $postCatList = $postsCat->selectAllByFkCategoria($categoria['id']);
                            $str = "blog.php?id=".strval($categoria['id']);
                            
                        ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $categoria['nome']; ?>
                                <a href="<?php echo $str; ?>">
                                    <span class="badge badge-primary badge-pill"><?php echo $postCatList['qtd']; ?></span>
                                </a>
                            </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="mb-5">
    <!-- Exibindo a primeira imagem -->
    <?php if (!empty($recentPosts[0]['img'])): ?>
        <?php $imagem_base64 = base64_encode($recentPosts[0]['img']); ?>
        <img src="data:image/jpeg;base64,<?= $imagem_base64; ?>" alt="" class="img-fluid">
    <?php endif; ?>
</div>

<div class="mb-5">
    <h3 class="mb-4">Recent Post</h3>
    <?php foreach ($recentPosts as $key => $post): ?>
        <!-- Ignorando a primeira imagem, pois já foi exibida fora do loop -->
        <?php if ($key === 0 || $key === 6 || $key === 7) continue; ?>
        
        <div class="d-flex align-items-center border-bottom mb-3 pb-3">
            <!-- Exibindo as próximas cinco imagens -->
            <?php if (!empty($post['img'])): ?>
                <?php $imagem_base64 = base64_encode($post['img']); ?>
                <img class="img-fluid" src="data:image/jpeg;base64,<?= $imagem_base64; ?>" style="width: 80px; height: 80px;" alt="">
            <?php endif; ?>
            <div class="d-flex flex-column pl-3">
                <a class="text-dark mb-2" href=""><?php echo $post['nome_post']; ?></a>
                <div class="d-flex">
                    <small class="mr-3"><i class="fa fa-user text-muted"></i> <?php echo $post['cd_user']; ?></small>
                    <!-- Se o nome da categoria estiver disponível, você pode exibi-lo aqui -->
                    <small class="mr-3"><i class="fa fa-folder text-muted"></i> <?php echo isset($post['nome_categoria']) ? $post['nome_categoria'] : 'Sem categoria'; ?></small>
                    <!-- Se o número de comentários estiver disponível, você pode exibi-lo aqui -->
                    <small class="mr-3"><i class="fa fa-comments text-muted"></i> <?php echo isset($post['numero_comentarios']) ? $post['numero_comentarios'] : 0; ?></small>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


                <div class="mb-5">
                    <?php if (!empty($recentPosts[6]['img'])): ?>
                        <?php $imagem_base64 = base64_encode($recentPosts[6]['img']); ?>
                        <img src="data:image/jpeg;base64,<?= $imagem_base64; ?>" alt="" class="img-fluid">
                    <?php endif; ?>
                </div>
                <!-- <div class="mb-5">
                    <h3 class="mb-4">Tag Cloud</h3>
                    <div class="d-flex flex-wrap m-n1">
                        <a href="" class="btn btn-outline-primary m-1">Design</a>
                        <a href="" class="btn btn-outline-primary m-1">Development</a>
                        <a href="" class="btn btn-outline-primary m-1">Marketing</a>
                        <a href="" class="btn btn-outline-primary m-1">SEO</a>
                        <a href="" class="btn btn-outline-primary m-1">Writing</a>
                        <a href="" class="btn btn-outline-primary m-1">Consulting</a>
                    </div>
                </div> -->
                <div class="mb-5">
                    <?php if (!empty($recentPosts[7]['img'])): ?>
                        <?php $imagem_base64 = base64_encode($recentPosts[7]['img']); ?>
                        <img src="data:image/jpeg;base64,<?= $imagem_base64; ?>" alt="" class="img-fluid">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
    <script>
        document.getElementById("comentarioForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Impede o envio padrão do formulário
            enviarComentario();
        });

        function enviarComentario() {
            var formData = new FormData(document.getElementById("comentarioForm"));

            fetch("processar/processar_comentario.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Manipular a resposta, se necessário
                console.log(data);
            })
            .catch(error => console.error('Erro:', error));
        }

        // Função para carregar os comentários
        function carregarComentarios(id) {
            console.log(id);
            $.ajax({
                url: 'processar/carregar_comentarios.php?id_post='+id, // Nome da página que irá carregar os comentários
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Preencher os comentários no HTML
                    preencherComentarios(data);
                },
                error: function () {
                    console.error('Erro ao carregar os comentários');
                }
            });
        }

        // Função para preencher os comentários no HTML
        function preencherComentarios(comentarios) {
            var container = $('#comentariosContainer');
            var qtdComentarios = document.getElementById("qtdComentarios");
            var numeroComentarios = document.getElementById("numeroComentarios");
            qtdComentarios.innerHTML = comentarios.length+" Comentários";
            numeroComentarios.innerHTML = comentarios.length;
            if(comentarios.length > 0){
                $.each(comentarios, function (index, comentario) {
                    // Criar o HTML para cada comentário
                    var comentarioHtml = `
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6>${comentario.nome} <small><i>${comentario.data}</i></small></h6>
                                <p>${comentario.mensagem}</p>
                            </div>
                        </div>
                    `;

                    // Adicionar o HTML do comentário ao container
                    container.append(comentarioHtml);
                });
            }else{
                var comentarioHtml = `
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6>Admin <small><i></i></small></h6>
                                <p>Não foi encontrado nenhum comentário realizado ainda para está publicação.</p>
                            </div>
                        </div>
                    `;
                // Adicionar o HTML do comentário ao container
                container.append(comentarioHtml);
            }
            
        }

        // Chamar a função para carregar os comentários quando a página carregar
        $(document).ready(function () {
            const queryString = window.location.search;
            // Criar um objeto URLSearchParams a partir da string de consulta
            const params = new URLSearchParams(queryString);
            // Obter o valor do parâmetro 'id'
            const id = params.get('id');
            carregarComentarios(id);
        });
    </script>
    <?php include('footerPage.php'); ?>
