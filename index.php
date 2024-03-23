<?php 
include('header_main.php'); 
?>
  <style>
        .categoria {
            background-image: url('img/price-1.jpg'); /* Substitua pelo caminho da imagem de fundo desejada */
            background-size: cover;
            background-position: center;
            padding: 20px; /* Ajuste o preenchimento conforme necessário */
            min-width: 100%; /* Largura mínima dos cards */
            margin-top: 5%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
            box-sizing: border-box;
        }

        .imagem-descricao {
            text-align: center;
            margin-top: 30px; /* Espaçamento entre os cards e a imagem/descrição */
        }

        .imagem-descricao img {
            max-width: 100%;
            border-radius: 10px;
        }

        .imagem-descricao h2 {
            margin-top: 20px;
            font-size: 24px;
            color: #333;
        }

        .imagem-descricao p {
            font-size: 16px;
            color: #666;
        }
    </style>
</head>
<body>

<?php 
require_once 'backend/Categorias.php';

$categoriaObj = new Categoria();
$categorias = $categoriaObj->selectAllWhereDisplay();

// Dividindo as categorias em grupos de 4
$categoria_groups = array_chunk($categorias, 4);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="categoria-group" id="categoriaGroup">
                <?php foreach ($categoria_groups as $groupIndex => $group): ?>
                    <?php foreach ($group as $categoria): 
                        $nome = "img/".$categoria['nome'].".jpg";                   
                        ?>
                        <div class="categoria col-md-3" style="background-image: url(<?php echo $nome; ?>);">
                            <p style="color:green;">Entre e confira:</p>
                            <h3 style="color:green;"><?= $categoria['nome']; ?></h3>
                            <a href="blog.php?id=<?= $categoria['id'];?>" class="btn btn-primary">Ver Mais</a>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


    <!-- About Start -->
    <div class="container py-5">
        <div class="row py-5">
            <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
                <h1 class="display-4 mb-4"><span class="text-primary"></span> Bem-Estar<span class="text-secondary"> e Felicidade</span></h1>
                <h5 class="text-muted mb-3">Na Ethernal Pets, nossa missão é proporcionar cuidados excepcionais e experiências positivas para os animais de estimação que fazem parte da sua família. Com uma equipe apaixonada por pets e anos de experiência no setor, estamos dedicados a oferecer serviços de hospedagem, segurança do seu amado companheiro.</h5>
                <p class="mb-4"></p>
                <ul class="list-inline">
                    <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>Best In Industry</h5></li>
                    <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>Emergency Services</h5></li>
                    <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>24/7 Customer Support</h5></li>
                </ul>
                <!-- <a href="" class="btn btn-lg btn-primary mt-3 px-4">Learn More</a> -->
            </div>
            <div class="col-lg-5">
                <div class="row px-3">
                    <div class="col-12 p-0">
                        <img class="img-fluid w-100" src="img/about-1.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="img/about-2.jpg" alt="">
                    </div>
                    <div class="col-6 p-0">
                        <img class="img-fluid w-100" src="img/about-3.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Booking Start -->
    <!-- <div class="container-fluid">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="bg-primary py-5 px-4 px-sm-5">
                        <form class="py-5">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 p-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 p-4" placeholder="Your Email" required="required" />
                            </div>
                            <div class="form-group">
                                <div class="date" id="date" data-target-input="nearest">
                                    <input type="text" class="form-control border-0 p-4 datetimepicker-input" placeholder="Reservation Date" data-target="#date" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text" class="form-control border-0 p-4 datetimepicker-input" placeholder="Reservation Time" data-target="#time" data-toggle="datetimepicker"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="custom-select border-0 px-4" style="height: 47px;">
                                    <option selected>Select A Service</option>
                                    <option value="1">Service 1</option>
                                    <option value="2">Service 1</option>
                                    <option value="3">Service 1</option>
                                </select>
                            </div>
                            <div>
                                <button class="btn btn-dark btn-block border-0 py-3" type="submit">Book Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                    <h4 class="text-secondary mb-3">Going for a vacation?</h4>
                    <h1 class="display-4 mb-4">Book For <span class="text-primary">Your Pet</span></h1>
                    <p>Labore vero lorem eos sed aliquy ipsum aliquy sed. Vero dolore dolore takima ipsum lorem rebum</p>
                    <div class="row py-2">
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-house font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Boarding</h5>
                                </div>
                                <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-food font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Feeding</h5>
                                </div>
                                <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-grooming font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Grooming</h5>
                                </div>
                                <p class="m-0">Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center mb-2">
                                    <h1 class="flaticon-toy font-weight-normal text-secondary m-0 mr-3"></h1>
                                    <h5 class="text-truncate m-0">Pet Tranning</h5>
                                </div>
                                <p class="m-0">Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Booking Start -->


    
    <style>
    .custom-card {
        height: 100%;
    }
</style>


    <!-- Services Start -->
    <div class="container-fluid bg-light pt-5">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h1 class="display-4 m-0"><span class="text-primary">Qual a importância </span> de memórias? </h1>
            </div>
            <div class="row pb-3">
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="custom-card d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-house display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">Companheiros para Sempre: A Importância dos Pets na Vida Humana</h3>
                        <p>Os animais de estimação desempenham um papel significativo em nossas vidas, oferecendo amor incondicional, companheirismo e apoio emocional. Eles se tornam membros queridos da família, trazendo alegria e conforto aos nossos dias.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="custom-card d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-food display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">Memórias que Duram para Sempre: Eternizando Nossos Animais de Estimação</h3>
                        <p>Eternizar nossos animais de estimação é uma forma de honrar a conexão especial que compartilhamos com eles. Guardar mensagens, fotos e lembranças em um sistema nos permite reviver momentos preciosos e manter viva a memória de nossos amados companheiros peludos.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="custom-card d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-grooming display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">Preservando o Legado dos Nossos Amigos Peludos: A Importância de Registrar Nossos Animais de Estimação</h3>
                        <p>Cada animal de estimação tem uma história única para contar, cheia de amor, aventuras e memórias compartilhadas. Registrar esses momentos em um sistema nos permite preservar o legado de nossos amigos peludos, criando um tesouro de lembranças que podemos compartilhar com as gerações futuras.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="custom-card d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-cat display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">A Fidelidade Inabalável dos Pets: Uma Lição de Amor e Devoção</h3>
                        <p>Os animais de estimação nos ensinam valiosas lições sobre amor, lealdade e compaixão. Eles estão sempre ao nosso lado, nos momentos bons e ruins, demonstrando uma fidelidade inabalável que toca nossos corações e nos lembra da importância de valorizar e cuidar daqueles que amamos.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="custom-card d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-dog display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">Companheiros de Jornada: Como Nossos Pets Enchem Nossas Vidas de Alegria e Significado</h3>
                        <p>Nossos animais de estimação não são apenas amigos; eles são nossos companheiros de jornada, enriquecendo nossas vidas com sua presença amorosa e inestimável. Eternizar nossos pets em um sistema é uma maneira de celebrar essa conexão especial e manter vivas as lembranças das muitas alegrias que compartilhamos juntos.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="custom-card d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                        <h3 class="flaticon-vaccine display-3 font-weight-normal text-secondary mb-3"></h3>
                        <h3 class="mb-3">A Herança de Amor dos Nossos Amigos de Quatro Patas: Por que Devemos Armazenar Mensagens e Fotos para Sempre</h3>
                        <p>Nossos animais de estimação deixam um legado de amor que perdura além de suas vidas. Ao armazenar mensagens e fotos em um sistema, estamos criando um arquivo de lembranças preciosas que nos confortam, nos inspiram e nos lembram da profunda conexão que compartilhamos com nossos amigos de quatro patas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Features Start -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <img class="img-fluid w-100" src="img/feature.jpg" alt="">
            </div>
            <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                <h1 class="display-4 mb-4"><span class="text-primary">Ethernal</span> Pets</h1>
                <p class="mb-4">Na busca por serviços de qualidade para o seu amado pet, a escolha do parceiro certo é crucial. Aqui, na Ethernal Pets, entendemos a importância de cuidar do seu animal de estimação com o mesmo amor e dedicação que você dispensa a ele em casa.</p>
                <p class="mb-4">Nossa equipe é composta por amantes de animais dedicados e profissionais experientes, prontos para oferecer os mais altos padrões de cuidado e atenção. Desde passeios divertidos até serviços de banho e tosa, cada interação com o seu pet é tratada com o maior cuidado e carinho.</p>
                <p class="mb-4">Além disso, valorizamos a transparência e a comunicação aberta com nossos clientes. Estamos sempre disponíveis para responder a suas perguntas, ouvir suas preocupações e adaptar nossos serviços para atender às necessidades individuais do seu pet.</p>
                <p class="mb-4">Ao escolher a Ethernal Pets, você está escolhendo uma parceria baseada em confiança, experiência e compromisso com o bem-estar do seu animal de estimação. Deixe-nos cuidar do seu amigo peludo como se fosse nosso próprio, e juntos vamos criar experiências memoráveis e felizes para toda a vida.</p>
                <div class="row py-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="flaticon-cat font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0">Best In Industry</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-4">
                            <h1 class="flaticon-doctor font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0">Emergency Services</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <h1 class="flaticon-care font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0">Special Care</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <h1 class="flaticon-dog font-weight-normal text-secondary m-0 mr-3"></h1>
                            <h5 class="text-truncate m-0">Customer Support</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid bg-light pt-5 pb-4">
        <div class="container py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Pricing Plan</h4>
                <h1 class="display-4 m-0">Escolha os <span class="text-primary">melhores preços</span></h1>
            </div>
            <div class="row">
                <?php
                require_once 'backend/Promocoes.php';
                $promocoes = new Promocoes();
                $promocoesLists = $promocoes->selectAll();
                $cont = 1;
                foreach ($promocoesLists as $promoc):
                    $str = "img/price-".$cont.".jpg";
                ?>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0">
                        <div class="card-header position-relative border-0 p-0 mb-4">
                            <img class="card-img-top" src="<?=  $str; ?>" alt="">
                            <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                                <h3 class="text-primary mb-3"><?= $promoc['nome']; ?></h3>
                                <h1 class="display-4 text-white mb-0">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small><?= $promoc['preco']; ?><small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                                </h1>
                            </div>
                        </div>
                        <div class="card-body text-center p-0">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Armazenamento: <?= $promoc['qtd_gb_armazenamento']; ?></li>
                                <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Dias: <?= $promoc['tempo_duracao']; ?></li>
                            </ul>
                        </div>
                        <div class="card-footer border-0 p-0">

                            <?php 
                            if (empty($_SESSION)) {
                                if($cont%2==0){ ?>
                                <a href="#" class="btn btn-secondary btn-block p-3" style="border-radius: 0;" data-toggle="modal" data-target="#loginModal">Acessar</a>
                                <?php }else{ ?>
                                <a href="#" class="btn btn-primary btn-block p-3" style="border-radius: 0;" data-toggle="modal" data-target="#loginModal">Acessar</a>
                                <?php } 
                            }else{
                                if($cont%2==0){ ?>
                                    <a href="javascript:void(0);" onclick="abrirModal(<?= $promoc['id']; ?>, <?= $promoc['preco']; ?>)" class="btn btn-secondary btn-block p-3" style="border-radius: 0;">Comprar</a>
                                <?php }else{ ?>
                                    <a href="javascript:void(0);" onclick="abrirModal(<?= $promoc['id']; ?>, <?= $promoc['preco']; ?>)" class="btn btn-primary btn-block p-3" style="border-radius: 0;">Comprar</a>
                                <?php } 
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php 
                $cont++;
                endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->


    <!-- Team Start -->
    <!-- <div class="container mt-5 pt-5 pb-3">
        <div class="d-flex flex-column text-center mb-5"> -->
            <!-- <h1 class="display-4 m-0">Nossa <span class="text-primary">Equipe</span></h1> -->
        <!-- </div>
        <div class="row"> -->
            <?php
            require_once 'backend/Owner.php'; // Substitua 'Owner.php' pelo nome do arquivo que contém a classe Owner

            // Crie uma instância da classe Owner
            $ownerObj = new Owner();

            // Recupere todos os proprietários
            $owners = [];//$ownerObj->selectAll();
            ?>

            <!-- Loop para exibir cada proprietário -->
            <?php 
            if(count($owners) > 0 ){
            foreach ($owners as $owner): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="team card position-relative overflow-hidden border-0 mb-4">
                        <img class="card-img-top" src="<?php echo "img/".$owner['caminho_foto']; ?>" alt="">
                        <div class="card-body text-center p-0">
                            <div class="team-text d-flex flex-column justify-content-center bg-light">
                                <h5><?php echo $owner['nome']; ?></h5>
                                <i><?php echo $owner['cargo']; ?></i>
                            </div>
                            <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                                <!-- Adapte os links sociais conforme necessário -->
                                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; 
            }else{ ?>      
                <center>
                <!-- <h4 class="text-secondary mb-3">Não há nenhum membro Cadastrado</h4> -->
                </center>      
            <?php } ?>
        <!-- </div>
    </div> -->
    <!-- Team End -->


    <!-- Testimonial Start -->
    <!-- <div class="container-fluid bg-light my-5 p-0 py-5">
        <div class="container p-0 py-5">
            <div class="d-flex flex-column text-center mb-5">
                <h4 class="text-secondary mb-3">Testimonial</h4>
                <h1 class="display-4 m-0">Our Client <span class="text-primary">Says</span></h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Client Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-2.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Client Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-3.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Client Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
                <div class="bg-white mx-3 p-4">
                    <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
                        <img class="img-fluid" src="img/testimonial-4.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="ml-3">
                            <h5>Client Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                    <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <!-- <div class="container pt-5">
        <div class="d-flex flex-column text-center mb-5">
            <h4 class="text-secondary mb-3">Pet Blog</h4>
            <h1 class="display-4 m-0"><span class="text-primary">Updates</span> From Blog</h1>
        </div>
        <div class="row pb-3">
            <div class="col-lg-4 mb-4">
                <div class="card border-0 mb-2">
                    <img class="card-img-top" src="img/blog-1.jpg" alt="">
                    <div class="card-body bg-light p-4">
                        <h4 class="card-title text-truncate">Diam amet eos at no eos</h4>
                        <div class="d-flex mb-3">
                            <small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
                            <small class="mr-2"><i class="fa fa-folder text-muted"></i> Web Design</small>
                            <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small>
                        </div>
                        <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est diam eos, rebum sit vero stet justo</p>
                        <a class="font-weight-bold" href="">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 mb-2">
                    <img class="card-img-top" src="img/blog-2.jpg" alt="">
                    <div class="card-body bg-light p-4">
                        <h4 class="card-title text-truncate">Diam amet eos at no eos</h4>
                        <div class="d-flex mb-3">
                            <small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
                            <small class="mr-2"><i class="fa fa-folder text-muted"></i> Web Design</small>
                            <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small>
                        </div>
                        <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est diam eos, rebum sit vero stet justo</p>
                        <a class="font-weight-bold" href="">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4">
                <div class="card border-0 mb-2">
                    <img class="card-img-top" src="img/blog-3.jpg" alt="">
                    <div class="card-body bg-light p-4">
                        <h4 class="card-title text-truncate">Diam amet eos at no eos</h4>
                        <div class="d-flex mb-3">
                            <small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
                            <small class="mr-2"><i class="fa fa-folder text-muted"></i> Web Design</small>
                            <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small>
                        </div>
                        <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est diam eos, rebum sit vero stet justo</p>
                        <a class="font-weight-bold" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Blog End -->
<!-- Modal -->
<div class="modal fade" id="comprarModal" tabindex="-1" role="dialog" aria-labelledby="comprarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="comprarModalLabel">Efetuar Pagamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
            <?php

// Chave PIX fornecida
$chavePix = "00020126330014BR.GOV.BCB.PIX01114500618180052040000530398654040.015802BR5924Mateus Tormes Gervazioni6009SAO PAULO61080540900062250521ZH2uDFf19hGEk7Z1esl8o6304DBF9";

// URL da API goqr.me para gerar QR Code
$apiUrl = "https://api.qrserver.com/v1/create-qr-code/";

// Parâmetros da requisição
$params = [
    'size' => '300x300', // Tamanho do QR Code
    'data' => $chavePix, // Dados a serem codificados no QR Code
];

// Construa a URL completa
$fullUrl = $apiUrl . '?' . http_build_query($params);

// Exiba o QR Code
echo '<img src="' . $fullUrl . '" alt="QR Code PIX">';

?>


                <p>Escaneie o QR Code abaixo para efetuar o pagamento:</p>
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.rawgit.com/serratus/quaggaJS/0.12.1/dist/quagga.min.js"></script>
<script>
    function abrirModal(idPromocao, preco) {
        // Abra a modal
        $('#comprarModal').modal('show');
    }
</script>
<?php include('footerPage.php'); ?>
