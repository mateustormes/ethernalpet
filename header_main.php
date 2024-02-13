<!DOCTYPE html>
<html lang="en">
<?php

session_start();
require_once 'backend/ConfiguracoesSite.php';
$configuracoesSite = new ConfiguracoesSite();
$configuracoesSites = $configuracoesSite->selectAll();
$namesSite = explode(" ", $configuracoesSites['name_site']);
?>
<head>
    <meta charset="utf-8">
    <title>PetLover - Pet Care Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-3" target="_blank" href="<?php echo $configuracoesSites['facebook']; ?>">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-3" target="_blank" href="<?php echo $configuracoesSites['twitter']; ?>">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-3" target="_blank" href="<?php echo $configuracoesSites['linkedin']; ?>">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-3" target="_blank" href="<?php echo $configuracoesSites['instagram']; ?>">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-3" target="_blank" href="<?php echo $configuracoesSites['youtube']; ?>">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-capitalize"><span class="text-primary"><?php echo $namesSite['0']; ?></span><?php echo $namesSite['1']; ?></h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="d-inline-flex flex-column text-center pr-3 border-right">
                        <h6>Opening Hours</h6>
                        <p class="m-0"><?php echo $configuracoesSites['horario_abertura']; ?></p>
                    </div>
                    <div class="d-inline-flex flex-column text-center px-3 border-right">
                        <h6>Email</h6>
                        <p class="m-0"><?php echo $configuracoesSites['email_contato']; ?></p>
                    </div>
                    <div class="d-inline-flex flex-column text-center pl-3">
                        <h6>Telefone</h6>
                        <p class="m-0"><?php echo $configuracoesSites['telefone_contato'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Safety</span>First</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    
                    <?php 
                    require_once 'backend/Categorias.php'; // Certifique-se de que o nome do arquivo corresponda ao utilizado no backend

                    $categoriaObj = new Categoria();
                    $categorias = $categoriaObj->selectAllWhereDisplay();
                    foreach ($categorias as $categoria): ?>
                        <a href="blog.php?id=<?= $categoria['id'];?>" class="nav-item nav-link"><?= $categoria['nome']; ?></a>
                    <?php endforeach; ?>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="about.php" class="dropdown-item">About</a>
                            <a href="service.php" class="dropdown-item">Service</a>
                            <a href="price.php" class="dropdown-item">Price</a>
                            <a href="booking.php" class="dropdown-item">Booking</a>
                        </div>
                    </div> -->
                    <a href="contact.php" class="nav-item nav-link">Contato</a>
                    
                </div>
                <?php if (empty($_SESSION)) { ?>
                    <a href="#" class="btn btn-lg btn-success px-3 d-none d-lg-block" data-toggle="modal" data-target="#loginModal">Acessar</a>
                    <a href="#" class="btn btn-lg btn-primary px-3 d-none d-lg-block"data-toggle="modal" data-target="#cadastroModal">Cadastrar</a>
                <?php }else{ ?>      
                    <a href="adminPage.php" style="text-decoration: none;" class="px-3 d-none d-lg-block"><?php echo "Bem vindo ".$_SESSION['usuario']; ?></a>
                <?php } ?>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Modal de Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Acesso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <!-- Formulário de Login -->
                    <form action="processar/pagina_validacao.php" method="post">
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Informe seu email">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Senha</label>
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Informe sua senha">
                        </div>
                        <button type="submit" class="btn btn-primary">Acessar</button>
                    </form>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#cadastroModal">Cadastrar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Modal de Cadastro -->
      <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cadastroModalLabel">Cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário de Cadastro -->
                    <form action="processar/pagina_cadastro.php" method="post">
                        <div class="form-group">
                            <label for="inputNovoNome">Novo Nome</label>
                            <input type="text" class="form-control" id="inputNovoNome" name="inputNovoNome" placeholder="Informe seu novo nome">
                        </div>
                        <div class="form-group">
                            <label for="inputNovoEmail">Novo Email</label>
                            <input type="email" class="form-control" id="inputNovoEmail" name="inputNovoEmail" placeholder="Informe seu novo email">
                        </div>
                        <div class="form-group">
                            <label for="inputNovaSenha">Nova Senha</label>
                            <input type="password" class="form-control" id="inputNovaSenha" name="inputNovaSenha" placeholder="Informe sua nova senha">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>