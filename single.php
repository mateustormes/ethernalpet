<?php include('header_main.php'); 
require_once 'backend/Posts.php';
$posts = new Posts();
$id = $_GET['id'];

$post = $posts->selectById($id);
$imagem_base64 = base64_encode($post['img']);
?>


    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-8">
                <div class="d-flex flex-column text-left mb-4">
                    <h1 class="mb-3"><?= $post['nome_post']; ?></h1>
                    <div class="d-index-flex mb-2">
                        <span class="mr-3"><i class="fa fa-user text-muted"></i> <?= $post['cd_user']; ?></span>
                        <span class="mr-3"><i class="fa fa-folder text-muted"></i> <?= $post['fk_categoria']; ?></span>
                        <span class="mr-3"><i class="fa fa-comments text-muted"></i> 15</span>
                        <span class="mr-3"><i class="fa fa-comments text-muted"></i> <?= $post['dt_user']; ?></span>
                    </div>
                </div>

                <div class="mb-5">
                    <img class="card-img-top" src="data:image/jpeg;base64,<?= $imagem_base64; ?>" alt="">
                    
                    <p>Sadipscing labore amet rebum est et justo gubergren. Et eirmod ipsum sit diam ut magna lorem. Nonumy vero labore lorem sanctus rebum et lorem magna kasd, stet amet magna accusam consetetur eirmod. Kasd accusam sit ipsum sadipscing et at at sanctus et. Ipsum sit gubergren dolores et, consetetur justo invidunt at et aliquyam ut et vero clita. Diam sea sea no sed dolores diam nonumy, gubergren sit stet no diam kasd vero, eos tempor gubergren clita est consetetur dolores et dolor. Sadipscing lorem kasd labore ea sanctus sanctus, dolores invidunt et consetetur et duo. Tempor dolores accusam sit vero sit, sed labore duo vero et at, et amet et justo gubergren. Labore aliquyam voluptua dolor nonumy lorem. Sanctus sed sadipscing rebum ipsum dolor et ea no. Ipsum elitr sea erat.</p>
                    <p>Voluptua est takimata stet invidunt sed rebum nonumy stet, clita aliquyam dolores vero stet consetetur elitr takimata rebum sanctus. Sit sed accusam stet sit nonumy kasd diam dolores, sanctus lorem kasd duo dolor dolor vero sit et. Labore ipsum duo sanctus amet eos et. Consetetur no sed et aliquyam ipsum justo et, clita lorem sit vero amet amet est dolor elitr, stet et no diam sit. Dolor erat justo dolore sit invidunt, sed duo dolor et amet no et. Ut takimata tempor kasd amet kasd ut. No et ipsum amet tempor et. Sed nonumy sed vero ut, sed aliquyam accusam clita dolores tempor est. Ea et takimata consetetur et amet sanctus. Duo no diam ipsum diam dolores, eirmod diam dolores clita sed erat magna. Dolore ut amet ea magna. Sea et dolore sit labore at amet eos. Dolor voluptua sit rebum sit ut nonumy. Dolor amet amet sit sadipscing, lorem.</p>
                 </div>
                
                <div class="media bg-light mb-5 p-4 p-md-5">
                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-4 mt-1" style="width: 80px;">
                    <div class="media-body">
                        <h5 class="mb-3">John Doe</h5>
                        <p class="m-0">Conset elitr erat vero labore dolor ipsum et diam, tempor eos dolor conset lorem ipsum, ipsum ipsum sit no ut est. Guber ea ipsum erat conset magna kasd amet est magna elitr ea sit justo sed.</p>
                    </div>
                </div>

                <div class="mb-5">
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
                </div>

                <div style="padding: 30px; background: #f6f6f6;">
                    <h3 class="mb-4">Leave a comment</h3>
                    <form>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website">
                        </div>

                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <input type="submit" value="Leave Comment" class="btn btn-primary px-3">
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="mb-5">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Keyword">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mb-5">
                    <h3 class="mb-4">Categories</h3>
                    
                    <ul class="list-group">
                    <?php 
                        require_once 'backend/Categorias.php'; // Certifique-se de que o nome do arquivo corresponda ao utilizado no backend

                        $categoriaObj = new Categoria();
                        $categorias = $categoriaObj->selectAll();
                        foreach ($categorias as $categoria): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $categoria['nome']; ?>
                                <span class="badge badge-primary badge-pill">150</span>
                            </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="mb-5">
                    <img src="img/blog-1.jpg" alt="" class="img-fluid">
                </div>
                <div class="mb-5">
                    <h3 class="mb-4">Recent Post</h3>
                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                        <img class="img-fluid" src="img/blog-1.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="d-flex flex-column pl-3">
                            <a class="text-dark mb-2" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            <div class="d-flex">
                                <small class="mr-3"><i class="fa fa-user text-muted"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-muted"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-muted"></i> 15</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                        <img class="img-fluid" src="img/blog-2.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="d-flex flex-column pl-3">
                            <a class="text-dark mb-2" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            <div class="d-flex">
                                <small class="mr-3"><i class="fa fa-user text-muted"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-muted"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-muted"></i> 15</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                        <img class="img-fluid" src="img/blog-3.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="d-flex flex-column pl-3">
                            <a class="text-dark mb-2" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            <div class="d-flex">
                                <small class="mr-3"><i class="fa fa-user text-muted"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-muted"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-muted"></i> 15</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                        <img class="img-fluid" src="img/blog-1.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="d-flex flex-column pl-3">
                            <a class="text-dark mb-2" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            <div class="d-flex">
                                <small class="mr-3"><i class="fa fa-user text-muted"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-muted"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-muted"></i> 15</small>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                        <img class="img-fluid" src="img/blog-2.jpg" style="width: 80px; height: 80px;" alt="">
                        <div class="d-flex flex-column pl-3">
                            <a class="text-dark mb-2" href="">Lorem ipsum dolor sit amet consec adipis elit</a>
                            <div class="d-flex">
                                <small class="mr-3"><i class="fa fa-user text-muted"></i> Admin</small>
                                <small class="mr-3"><i class="fa fa-folder text-muted"></i> Web Design</small>
                                <small class="mr-3"><i class="fa fa-comments text-muted"></i> 15</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <img src="img/blog-2.jpg" alt="" class="img-fluid">
                </div>
                <div class="mb-5">
                    <h3 class="mb-4">Tag Cloud</h3>
                    <div class="d-flex flex-wrap m-n1">
                        <a href="" class="btn btn-outline-primary m-1">Design</a>
                        <a href="" class="btn btn-outline-primary m-1">Development</a>
                        <a href="" class="btn btn-outline-primary m-1">Marketing</a>
                        <a href="" class="btn btn-outline-primary m-1">SEO</a>
                        <a href="" class="btn btn-outline-primary m-1">Writing</a>
                        <a href="" class="btn btn-outline-primary m-1">Consulting</a>
                    </div>
                </div>
                <div class="mb-5">
                    <img src="img/blog-3.jpg" alt="" class="img-fluid">
                </div>
                <div>
                    <h3 class="mb-4">Plain Text</h3>
                    Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea est aliquyam dolor et. Et no consetetur eos labore ea erat voluptua et. Et aliquyam dolore sed erat. Magna sanctus sed eos tempor rebum dolor, tempor takimata clita sit et elitr ut eirmod.
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

    <?php include('footerPage.php'); ?>
