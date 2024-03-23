<?php 

session_start(); 
include('sideMenu.php');
?>
<style>
       

        .profile-card {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            margin-left:10%;
            width: 80%;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 5px solid #fff; /* Adicione uma borda branca para destacar a imagem */
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .profile-email {
            font-size: 18px;
            color: #555;
        }
    </style>

<div class="profile-card">
        <?php

        require_once 'backend/Usuarios.php';
        if (isset($_SESSION['id_usuario'])) {
            $user_id = $_SESSION['id_usuario'];

            $usuarios = new Usuarios();
            $usuario_logado = $usuarios->selectByUserId($user_id);

            if (isset($usuario_logado[0])) {
                $usuario = $usuario_logado[0];
                echo '<div class="profile-image">';
                echo '<img src="img/carousel-1.jpg" alt="Imagem de Perfil">';
                echo '</div>';
                
                echo "<div class='profile-name'>{$usuario['nome']}</div>";
                echo "<div class='profile-email'>{$usuario['email']}</div>";
                echo "<div class='profile-email'>Administrador: {$usuario['administrador']}</div>";
            } else {
                echo "<p>Usuário não encontrado.</p>";
            }
        } else {
            echo "<p>Usuário não está logado.</p>";
        }
        ?>
    </div>
    <div class="profile-card">
        <div class="container mt-5">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID do Ticket</th>
                            <th>ID do Usuário</th>
                            <th>ID da Promoção</th>
                            <th>Status do Ticket</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <h2 class="mb-4">Lista de Tickets</h2>

                        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#cadastroTicketModal">Cadastrar</button>

                        <?php
                        require_once 'backend/Ticket.php';
                        $tickets = new Ticket();
                        $ticketsList = $tickets->selectAll();

                        foreach ($ticketsList as $ticket) {
                            echo '<tr>';
                            echo '<td>' . $ticket['id_ticket'] . '</td>';
                            echo '<td>' . $ticket['nome_usuario'] . '</td>';
                            echo '<td>' . $ticket['nome_promocao'] . '</td>';
                            if ($usuario['administrador'] != 'F' && $ticket['status_ticket'] == 'Em Andamento') {
                                echo '<td>' . $ticket['status_ticket'].'<br>';
                                echo '<a class="btn btn-danger btn-sm" href="processar/atualizar_status_ticket.php?id_ticket='.$ticket['id_ticket'].'">Finalizar</a></td>';
                            }else{
                                echo '<td>' . $ticket['status_ticket'] . '</td>';
                            }
                            echo '<td>                                        
                                    <a class="btn btn-success btn-sm" href="recibos.php?id_ticket='.$ticket['id_ticket'].'">Abrir</a>
                                </td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<div class="modal fade" id="cadastroTicketModal" tabindex="-1" role="dialog" aria-labelledby="cadastroTicketModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroTicketModalLabel">Cadastrar Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulário de cadastro de ticket -->
                <form action="processar/cadastrar_ticket.php" method="post">
                    <!-- Campos do formulário -->
                    <input type="hidden" name="fk_usuario" value="<?php echo $_SESSION['id_usuario']; ?>">
                    <label>Código do Usuário: <?php echo $_SESSION['id_usuario']; ?></label><br>
                    <label>Selecione a Promoção:</label><br>
                    <?php
                    require_once 'backend/Promocoes.php';

                    // Instanciando o objeto de Promoções
                    $promocoes = new Promocoes();

                    // Obtendo todas as promoções
                    $promocoesList = $promocoes->selectAll();
                    ?>

                    <select class="col-md-12" name="fk_promocoes" required>
                        <option value="" disabled selected>Selecione a Promoção</option>
                        <?php foreach ($promocoesList as $promocao): ?>
                            <option value="<?php echo $promocao['id']; ?>"><?php echo $promocao['nome']; ?></option>
                        <?php endforeach; ?>
                    </select><br>
                    <!-- Adicione outros campos conforme necessário -->
                    <label>Status do Ticket:</label><br>
                    <input class="col-md-12" type="text" name="status_ticket" value="Em Andamento" readonly><br>
                    <!-- Botão de enviar --><br>
                    <center>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('footerPage.php'); ?>