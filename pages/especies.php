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
        <div class="catalogo container my-5">
            <h2 class="text-center text-light mb-4">Espécies</h2>
        
            <div class="mb-3">
                <button class="btn btn-outline-light w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#animais">
                    🐾 Animais
                </button>
                <div class="collapse mt-2" id="animais">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=vanellus-chilensis" class="text-decoration-none text-dark">Quero-quero <span class="fst-italic text-muted">(Vanellus chilensis)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=colaptes-melanochloros" class="text-decoration-none text-dark">Pica-pau <span class="fst-italic text-muted">(Colaptes melanochloros)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=lycalopex-gymnocercus" class="text-decoration-none text-dark">Graxaim <span class="fst-italic text-muted">(Lycalopex gymnocercus)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=trachemys-dorbigni" class="text-decoration-none text-dark">Tigre-d’água <span class="fst-italic text-muted">(Trachemys dorbigni)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=caiman-latirostris" class="text-decoration-none text-dark">Jacaré-do-papo amarelo <span class="fst-italic text-muted">(Caiman latirostris)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=alouatta-guariba" class="text-decoration-none text-dark">Bugio <span class="fst-italic text-muted">(Allouatta guariba)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=dasypus-hybridus" class="text-decoration-none text-dark">Tatu molita <span class="fst-italic text-muted">(Dasypus hybridus)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=salvator-merianae" class="text-decoration-none text-dark">Teiú <span class="fst-italic text-muted">(Salvator merianae)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=athene-cunicularia" class="text-decoration-none text-dark">Coruja buraqueira <span class="fst-italic text-muted">(Athene cunicularia)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=bothrops-alternatus" class="text-decoration-none text-dark">Cruzeira <span class="fst-italic text-muted">(Bothrops alternatus)</span></a></li>
                    </ul>                    
                </div>
            </div>
        
            <div class="mb-3">
                <button class="btn btn-outline-light w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#plantas">
                    🌿 Plantas
                </button>
                <div class="collapse mt-2" id="plantas">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=syagrus-romanzoffiana" class="text-decoration-none text-dark">Jerivá <span class="fst-italic text-muted">(Syagrus romanzoffiana)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=bauhinia-variegata" class="text-decoration-none text-dark">Bauhinia <span class="fst-italic text-muted">(Bauhinia variegata)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=pinus-sp" class="text-decoration-none text-dark">Pinus <span class="fst-italic text-muted">(Pinus sp.)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=ochna-serrulata" class="text-decoration-none text-dark">Ochna <span class="fst-italic text-muted">(Ochna serrulata)</span></a></li>
                    </ul>                    
                </div>
            </div>
        
            <div class="mb-3">
                <button class="btn btn-outline-light w-100 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#fungos">
                    🍄 Fungos
                </button>
                <div class="collapse mt-2" id="fungos">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=amanita-muscaria" class="text-decoration-none text-dark">Amanita muscaria <span class="fst-italic text-muted">(Amanita muscaria)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=cymatoderma-caperatum" class="text-decoration-none text-dark">Cymatoderma caperatum <span class="fst-italic text-muted">(Cymatoderma caperatum)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=cryptotrama-asprata" class="text-decoration-none text-dark">Cryptotrama asprata <span class="fst-italic text-muted">(Cryptotrama asprata)</span></a></li>
                        <li class="list-group-item"><a href="../pages/especies-individual.php?id=kusaghiporia-talpae" class="text-decoration-none text-dark">Kusaghiporia talpae <span class="fst-italic text-muted">(Kusaghiporia talpae)</span></a></li>
                    </ul>                    
                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../script.js"></script>
</body>
</html>
