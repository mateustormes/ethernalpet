 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-4 col-md-12 mb-5">
                <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary"><?php echo $namesSite['0']; ?></span><?php echo $namesSite['1']; ?></h1>
                <p class="m-0"><?php echo $configuracoesSites['descricao_rodape'];?></p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i><?php echo $configuracoesSites['endereco_contato'];?></p>
                        <p><i class="fa fa-phone-alt mr-2"></i><?php echo $configuracoesSites['telefone_contato'];?></p>
                        <p><i class="fa fa-envelope mr-2"></i><?php echo $configuracoesSites['email_contato'];?></p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="<?php echo $configuracoesSites['twitter']; ?>"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="<?php echo $configuracoesSites['facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="<?php echo $configuracoesSites['linkedin']; ?>"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="<?php echo $configuracoesSites['instagram']; ?>"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-primary mb-4">Popular Links</h5>
                        
                        <div class="d-flex flex-column justify-content-start">
                            <?php 
                                require_once 'backend/Categorias.php';
                                $categoriaObj = new Categoria();
                                $categorias = $categoriaObj->selectAllWhereDisplay();
                                foreach ($categorias as $categoria): ?>
                                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i><?= $categoria['nome']; ?></a>
                            <?php endforeach; ?>
                        </div>
                        
                    </div>
                    <div class="col-md-4 mb-5">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>