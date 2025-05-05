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
                <div class="text-center mt-4 d-flex flex-column align-items-center">
                    <a href="pages/aventura.php" class="btn btn-success text-light d-block mb-4 fs-2 rounded-pill">Começar Aventura</a>
                    <button id="btn-tutorial" class="btn btn-success text-light d-block mb-3 fs-5 rounded-pill">Como Jogar?</button>
                </div>
                <div id="tutorial-container" class="tutorial-box d-none">
                    <div class="mascot">
                        <img src="../assets/jerivaldo.png" alt="Mascote do Jardim" />
                    </div>
                    <div class="speech-bubble">
                        <p id="tutorial-text">Olá explorador! Eu sou o mascote do Jardim Botânico!</p>
                        <button id="next-tutorial" class="btn btn-sm btn-success mt-2">Próximo</button>
                    </div>
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
    <script>
    const tutorial = [
        "Olá explorador! Eu sou o mascote do Jardim Botânico!",
        "Neste jogo, você pode explorar áreas como a floresta, lago, e estufa.",
        "Descubra espécies únicas e ganhe conquistas incríveis!",
        "Acompanhe seu progresso no álbum de descobertas.",
        "Boa sorte e divirta-se explorando a natureza!",
    ];

    let currentStep = 0;

    document.getElementById('btn-tutorial').addEventListener('click', () => {
        currentStep = 0;
        document.getElementById('tutorial-text').textContent = tutorial[currentStep];
        document.getElementById('tutorial-container').classList.remove('d-none');
    });

    document.getElementById('next-tutorial').addEventListener('click', () => {
        currentStep++;
        if (currentStep < tutorial.length) {
            document.getElementById('tutorial-text').textContent = tutorial[currentStep];
        } else {
            document.getElementById('tutorial-container').classList.add('d-none');
        }
    });
    </script>
</body>
</html>
