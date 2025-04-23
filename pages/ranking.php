<?php
session_start();
$conn = new mysqli("localhost", "root", "", "jardim_botanico");

// Consulta SQL para obter ranking de pontos dos usuários
$sql = "
SELECT 
    u.email,
    COALESCE(SUM(p.pontos), 0) AS total_pontos
FROM 
    usuarios u
LEFT JOIN 
    plantas_pegas p ON u.id = p.usuario_id
GROUP BY 
    u.id, u.email
ORDER BY total_pontos DESC;
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <title>Ranking de Usuários | Jardim Botânico UFSM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="background">
        <?php include '../navbar.php'; ?>
        
        <section class="text-center py-5">
            <div class="container">
                <h1 class="text-light">Ranking de Exploradores</h1>
                <p class="text-light mb-4">Veja os usuários com mais pontos coletados no Jardim Botânico.</p>

                <div class="table-responsive">
                    <table class="table table-dark table-hover table-bordered rounded shadow">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Pontos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $posicao = 1;
                            if ($result->num_rows > 0):
                                while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <th scope="row"><?php echo $posicao++; ?></th>
                                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                                        <td><?php echo $row['total_pontos']; ?></td>
                                    </tr>
                                <?php endwhile;
                            else: ?>
                                <tr>
                                    <td colspan="3">Nenhum dado encontrado.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

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
