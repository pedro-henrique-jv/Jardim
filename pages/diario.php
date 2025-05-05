<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <title>Aventura | Jardim Botânico UFSM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="background">
        <?php include '../navbar.php'; ?>

        <!-- Seção: Barra de Progresso -->
        <div class="container my-5 text-light">
            <h2 class="text-center mb-4">Seu Progresso na Aventura</h2>
            <div class="progress" style="height: 30px;">
                <?php
                $progresso = 40; // Exemplo: 40% concluído (substitua com valor dinâmico depois)
                ?>
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" 
                     style="width: <?= $progresso ?>%;" 
                     aria-valuenow="<?= $progresso ?>" aria-valuemin="0" aria-valuemax="100">
                    <?= $progresso ?>%
                </div>
            </div>
        </div>

        <!-- Seção: Galeria de Fotos Descobertas -->
        <div class="container my-5">
            <h2 class="text-center mb-4 text-light">Suas Descobertas</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Card 1 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/descoberta1.jpg" class="card-img-top" alt="Área 1">
                        <div class="card-body">
                            <h5 class="card-title">Orquídea Rara</h5>
                            <p class="card-text">Você encontrou uma espécie rara de orquídea!</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/descoberta2.jpg" class="card-img-top" alt="Área 2">
                        <div class="card-body">
                            <h5 class="card-title">Trilha das Aves</h5>
                            <p class="card-text">Avistou uma revoada de aves nativas ao entardecer.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col">
                    <div class="card h-100">
                        <img src="../images/descoberta3.jpg" class="card-img-top" alt="Área 3">
                        <div class="card-body">
                            <h5 class="card-title">Cogumelo Luminoso</h5>
                            <p class="card-text">Achou um fungo bioluminescente sob a sombra da figueira.</p>
                        </div>
                    </div>
                </div>
                <!-- Adicione mais cards conforme necessário -->
            </div>
        </div>

        <!-- Rodapé -->
        <footer class="footer-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p><i class="bi bi-envelope"></i> contato@jardimbotanico.ufsm.br</p>
                        <p><i class="bi bi-geo-alt"></i> Av. Roraima, 1000 - Camobi, Santa Maria - RS</p>
                        <p><i class="bi bi-clock"></i> Funcionamento: Segunda à Sexta: 8:30h - 12h, 13:30h - 17h</p>
                        <div class="social-icons mt-3">
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-youtube"></i></a>
                        </div>
                        <small class="mt-4 d-block">© 2025 Jardim Botânico UFSM - Todos os direitos reservados.</small>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
