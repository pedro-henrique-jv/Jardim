<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon" />
    <title>Aventura | Jardim Botânico UFSM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/styles.css" />
</head>
<body>
    <div class="background">
        <?php include '../navbar.php'; ?>

        <div class="container my-5 text-light">
            <h2 class="text-center mb-4">Seu Progresso na Aventura</h2>
            <div class="progress" style="height: 30px;">
                <?php
                $progresso = 20;
                ?>
                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" 
                     style="width: <?= $progresso ?>%;" 
                     aria-valuenow="<?= $progresso ?>" aria-valuemin="0" aria-valuemax="100">
                    <?= $progresso ?>%
                </div>
            </div>
        </div>

        <div class="container my-5">
            <h2 class="text-center mb-4 text-light">Suas Descobertas</h2>
        </div>

        <!-- Botão para abrir a câmera e escanear QR code -->
        <div class="container my-5 text-center text-light">
            <button id="btn-descobrir" class="btn btn-success btn-lg rounded-pill mb-4">
                <i></i> Descobrir
            </button>

            <div id="qr-reader" style="width: 300px; margin: 0 auto; display: none;"></div>
        </div>

        <div class="container my-5">
            <div class="d-flex justify-content-center">
                <a href="javascript:history.back()" class="btn btn-secondary btn-lg rounded-pill">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
            </div>
        </div>

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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        document.getElementById('btn-descobrir').addEventListener('click', () => {
            const qrReader = document.getElementById('qr-reader');

            if (qrReader.style.display === 'none') {
                qrReader.style.display = 'block';
                startScanner();
            } else {
                qrReader.style.display = 'none';
                if (window.html5QrCode) {
                    window.html5QrCode.stop().catch(err => console.error('Parada do scanner falhou:', err));
                }
            }
        });

        function startScanner() {
            window.html5QrCode = new Html5Qrcode("qr-reader");

            const qrCodeSuccessCallback = (decodedText, decodedResult) => {
                console.log(`QR Code detectado: ${decodedText}`);
                window.html5QrCode.stop();
                document.getElementById('qr-reader').style.display = 'none';

                // Envia o resultado para o backend para salvar a descoberta
                fetch(`salvar_descoberta.php?id=${encodeURIComponent(decodedText)}`)
                .then(res => res.json())
                .then(data => {
                    alert(data.msg || 'Descoberta salva!');
                    // Você pode atualizar a barra de progresso aqui se quiser
                })
                .catch(err => {
                    alert('Erro ao salvar descoberta.');
                    console.error(err);
                });
            };

            const config = { fps: 10, qrbox: 250 };

            window.html5QrCode.start(
                { facingMode: "environment" },
                config,
                qrCodeSuccessCallback
            ).catch(err => {
                alert('Erro ao acessar a câmera: ' + err);
                console.error(err);
            });
        }
    </script>
</body>
</html>
