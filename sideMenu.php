<!DOCTYPE html>
<html lang="en">
<?php 
require_once 'backend/ConfiguracoesSite.php';
$configuracoesSite = new ConfiguracoesSite();
$configuracoesSites = $configuracoesSite->selectAll();
$namesSite = explode(" ", $configuracoesSites['name_site']);
session_start(); 
?>

<head>
    <meta charset="utf-8">
    <title><?php echo $configuracoesSites['name_site']; ?></title>
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
                    <a href="#" class="nav-item nav-link active" onclick="loadPage('adminPage.php')">Home</a>
                    <a href="#" class="nav-item nav-link" onclick="loadPage('pagina_categoria.php')">Categorias</a>
                    <a href="#" class="nav-item nav-link" onclick="loadPage('pagina_empresas.php')">Empresas</a>
                    <a href="#" class="nav-item nav-link" onclick="loadPage('pagina_posts.php')">Posts</a>
                    <a href="#" class="nav-item nav-link" onclick="loadPage('pagina_usuarios.php')">Usuarios</a>
                    <a href="#" class="nav-item nav-link" onclick="loadPage('pagina_pagamentos.php')">Pagamentos</a>
                    <a href="index.php" class="nav-item nav-link">Sair</a>;
                </div>
                <!-- <a href="" class="btn btn-lg btn-primary px-3 d-none d-lg-block">Get Quote</a> -->
            </div>
            <a class="px-3 d-none d-lg-block"><?php echo "Bem vindo ".$_SESSION['usuario']; ?></a>
        </nav>
    </div>
    <script>
        function loadPage(page) {
            // Simplesmente redirecione para a página desejada
            window.location.href = page;
        }
    </script>
    <!-- Navbar End -->