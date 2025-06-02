  <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  ?>
  <link rel="stylesheet" href="css/modo.css">
  <link rel="stylesheet" href="css/menu.css">
  <script src="js/modo.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=settings" />

  <body class="<?php echo isset($_COOKIE['modo']) ? $_COOKIE['modo'] : 'claro'; ?>">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid d-flex align-items-center position-relative">
        <!-- Logo à esquerda -->
        <?php if (isset($_SESSION['autenticado'])) { ?>
          <a class="navbar-brand me-auto" href="financa.php">
            <img
              class="logo-financaspro"
              data-src-claro="img/financaspro.png"
              data-src-escuro="img/financaspro1.png"
              src="img/financaspro.png"
              alt="FinançasPro">
          </a>
        <?php } ?>
        <!-- Links centralizados -->
        <div class="collapse navbar-collapse justify-content-center flex-grow-1" id="navbarNavAutenticado">
          <ul class="navbar-nav">
            <?php if (isset($_SESSION['autenticado'])) { ?>
              <li class="nav-item"><a class="nav-link" href="index.php">Orçamento</a></li>
              <li class="nav-item"><a class="nav-link" href="mensal.php">Estátisticas</a></li>
              <!-- <li class="nav-item"><a class="nav-link" href="ordenado.php">Ordenado</a></li> -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Ferramentas</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="conversor.php">Conversor </a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="bolsa.php">Valores da Bolsa</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" class="nav-link" href="anual.php">Simulador</a></li>
                  <?php if (isset($_SESSION['autenticado']) && $_SESSION['tipoUtilizador'] == 1) { ?>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="adm.php">Administrador</a></li>
                  <?php } ?>
              </li>
          </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Sobre</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="sobrenos.php">Sobre Nós</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" class="nav-link" href="logout.php">Logout</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="ajuda.php">Ajuda</a></li>
          <li class="nav-item"><a class="nav-link"" href=""><span class="material-symbols-outlined">settings</span></a></li>
        </div>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavNaoAutenticado">
        <?php }
            if (!isset($_SESSION['autenticado'])) { ?>
          <li class="nav-item"><a class="nav-link" href="registar.php">Registar</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
        <?php } ?>
        </div>
        <!-- Botão modo claro/escuro -->
        <div class="toggle-container">
          <input type="checkbox" id="modoToggle">
          <label for="modoToggle" class="switch">
            <span class="icon sol">&#9728;</span>
            <span class="icon lua">&#9790;</span>
            <span class="slider"></span>
          </label>
        </div>
      </div>
    </nav>
  </body>