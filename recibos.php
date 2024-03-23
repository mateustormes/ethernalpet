<?php include('sideMenu.php');
session_start(); 
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
            
        <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID do Recibo</th>
            <th>Data de Depósito</th>
            <th>Nome do Recibo</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <h2 class="mb-4">Lista de Recibos</h2>
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#cadastroReciboModal">Cadastrar</button>

        <?php
        require_once 'backend/Recibo.php';
        $recibos = new Recibo();

        // Substitua o valor '1' pelo ID do ticket desejado
        $id_ticket = isset($_GET['id_ticket']) ? $_GET['id_ticket'] : 1;
        $recibosList = $recibos->listarReciboPorTicket($id_ticket);

        foreach ($recibosList as $recibo) {
            echo '<tr>';
            echo '<td>' . $recibo['id_recibo'] . '</td>';
            echo '<td>' . $recibo['data_deposito'] . '</td>';
            echo '<td>' . $recibo['nome_recibo'] . '</td>';
            echo '<td>' . $recibo['descricao'] . '</td>';
            echo '<td>                                        
                    <a class="btn btn-info btn-sm" href="processar/visualizar_recibo.php?id_recibo=' . $recibo['id_recibo'] . '" target="_blank">Visualizar</a>
                </td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>

        </div>
    </div>


<!-- Modal de Cadastro de Recibo -->
<div class="modal fade" id="cadastroReciboModal" tabindex="-1" role="dialog" aria-labelledby="cadastroReciboModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastroReciboModalLabel">Cadastrar Recibo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulário de cadastro de recibo -->
                <form action="processar/cadastrar_recibo.php" method="post" enctype="multipart/form-data">
                    <!-- Campos do formulário -->
                    <input type="hidden" name="fk_ticket" value="<?php echo $id_ticket; ?>">
                    <label>Data de Depósito:</label><br>
                    <input class="col-md-12" type="date" name="data_deposito" required><br>
                    <label>Nome do Recibo:</label><br>
                    <input class="col-md-12" type="text" name="nome_recibo" required><br>
                    <label>Foto do Recibo:</label><br>
                    <input class="col-md-12" type="file" name="foto_recibo" accept="image/*" required><br>
                    <label>Descrição:</label><br>
                    <textarea class="col-md-12" name="descricao" rows="3" required></textarea><br>
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