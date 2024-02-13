<?php include('header_main.php'); ?>



    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <!-- <h4 class="text-secondary mb-3">Contact Us</h4> -->
            <h1 class="display-4 m-0">Entre em<span class="text-primary"> Contato</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form action="processar/inserirContato.php" method="POST" name="sentMessage">
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="name" name="name" placeholder="Informe o seu nome" required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control p-4" id="email" name="email" placeholder="Informe o seu email" required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="subject" name="subject" placeholder="Título" required="required" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" id="message" name="message" placeholder="Informe a sua mensagem" required="required"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Enviar</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-12 mb-n2 p-0">
                <iframe style="width: 100%; height: 500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14729.872354782592!2d-50.41856643724583!3d-22.66134969721886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b9465ea65f2e39%3A0x40a490cf1f63590!2sAssis%2C%20SP%2C%2019890-000!5e0!3m2!1sen!2sbr!4v1644806638048!5m2!1sen!2sbr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <?php include('footerPage.php'); ?>
