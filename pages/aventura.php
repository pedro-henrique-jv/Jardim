<?php
session_start();

file_put_contents("teste.txt", print_r(($_SESSION['usuario_id']), true));

if (!isset($_SESSION['usuario_id'])) {
    // Redireciona para a página de login se não estiver logado
    header("Location: /jardim/pages/login.php");
    exit();
}

$usuarioId = $_SESSION['usuario_id'];
$especiesPegas = [];

// Conexão com o banco de dados
$conn = new mysqli('localhost', 'root', '', 'jardim_botanico');
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Buscar os IDs das espécies que o usuário pegou
$stmt = $conn->prepare("SELECT especie_id FROM plantas_pegas WHERE usuario_id = ?");
$stmt->bind_param("i", $usuarioId);
$stmt->execute();
$result = $stmt->get_result();
$idsPegos = [];
while ($row = $result->fetch_assoc()) {
    $idsPegos[] = $row['especie_id'];
}
$stmt->close();
$conn->close();

$jsonPath = '../especies.json';
$todasEspecies = [];
if (file_exists($jsonPath)) {
    $json = file_get_contents($jsonPath);
    $todasEspecies = json_decode($json, true);
}

foreach ($todasEspecies as $especie) {
    if (in_array($especie['id'], $idsPegos)) {
        $especiesPegas[] = $especie;
    }
}
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
                $totalEspecies = count(json_decode(file_get_contents('../especies.json'), true));
                $quantidadePegas = count($especiesPegas);
                $progresso = $totalEspecies > 0 ? intval(($quantidadePegas / $totalEspecies) * 100) : 0;
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
                <?php if (empty($especiesPegas)): ?>
                    <p class="text-light text-center">Você ainda não encontrou nenhuma espécie. Explore o jardim e escaneie os QR Codes!</p>
                <?php else: ?>
                    <?php foreach ($especiesPegas as $especie): ?>
                        <div class="col">
                            <div class="card h-100">
                                <img src="<?= htmlspecialchars($especie['imagem']) ?>" class="card-img-top" alt="<?= htmlspecialchars($especie['nome']) ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($especie['nome']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($especie['descricao']) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
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
