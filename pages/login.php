<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/favicon.ico" type="image/x-icon">
    <title>Jardim Botânico UFSM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="background">
    <?php include('../navbar.php'); ?>
        <section class="login-section py-5">
            <div class="container">
                <h2 class="text-center text-light mb-4">Login</h2>
                <form action="login2.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label text-light">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-light">Senha</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>
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