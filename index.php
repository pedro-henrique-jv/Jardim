<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
    <title>Jardim Botânico UFSM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="background">
        <?php include 'navbar.php'; ?>
        <section class="game-intro text-center py-5">
            <div class="container">
                <h1 class="game-title text-light">ECOSCAN</h1>
                <p class="game-subtitle text-light">Explore espécies, aprenda sobre a natureza e desvende os segredos do Jardim Botânico UFSM.</p>
                <button class="btn btn-start mt-4 text-light">Começar aventura</button>
                <div class="game-info mt-5 text-light">
                    <p><strong>Plantas descobertas:</strong></p>
                </div>
            </div>
        </section>
        <section class="catalog-section text-center py-5">
            <div class="container">
                <h2 class="text-light">Catálogo de Espécies</h2>
                <p class="text-light mb-4">
                    Acesse o catálogo completo de espécies do Jardim Botânico e descubra todas as plantas e animais disponíveis para exploração.
                </p>
                <a href="/jardim/pages/especies.php" class="btn btn-outline-light">Ver Catálogo</a>
            </div>
        </section>     
        <footer class="footer-box">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p><i class="bi bi-envelope"></i> contato@jardimbotanico.ufsm.br</p>
                        <p><i class="bi bi-geo-alt"></i> Av. Roraima, 1000 - Camobi, Santa Maria - RS</p>
                        <p><i class="bi bi-clock"></i> Funcionamento: Segunda á Sexta: 8:30h - 12h, 13:30h - 17h</p>
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
