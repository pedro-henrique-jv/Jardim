<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo isset($_SESSION['nome']) ? '/jardim/index.php' : '/jardim/index.php'; ?>">
            <img src="../assets/logo_jardim.png" alt="Logo">
        </a>

        <div class="dropdown ms-auto me-2 d-flex align-items-center">
            <?php
            if (isset($_SESSION['nome'])) {
                // Usuário logado
                echo '<button class="btn btn-outline-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">'
                    . htmlspecialchars($_SESSION['nome']) . '</button>';
                echo '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="pages/logout.php">Logout</a></li>
                      </ul>';
            } else {
                // Usuário não logado
                echo '<button class="btn btn-outline-light dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person fs-1"></i>
                      </button>';
                echo '<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="/pages/login.php">Login</a></li>
                        <li><a class="dropdown-item" href="/pages/cadastro.php">Cadastre-se</a></li>
                      </ul>';
            }
            ?>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item"><a class="nav-link" href="/pages/especies<?php echo isset($_SESSION['nome']) ? '.php' : '.php'; ?>">Espécies</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/loc<?php echo isset($_SESSION['nome']) ? '.php' : '.php'; ?>">Como chegar</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/noticias<?php echo isset($_SESSION['nome']) ? '.php' : '.php'; ?>">Notícias</a></li>
                <li class="nav-item"><a class="nav-link" href="/pages/sobre<?php echo isset($_SESSION['nome']) ? '.php' : '.php'; ?>">Sobre</a></li>
                <li class="nav-item d-flex align-items-center">
                    <input type="text" id="search-input" class="form-control me-2" placeholder="Pesquisar...">
                    <button id="toggle-search" class="btn btn-lupa" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
