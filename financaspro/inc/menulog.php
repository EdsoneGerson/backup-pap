  <?php
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  ?>
  <link rel="stylesheet" href="css/modo.css">
  <link rel="stylesheet" href="css/menu.css">
  <script src="js/modo.js"></script>

  <body class="<?php echo isset($_COOKIE['modo']) ? $_COOKIE['modo'] : 'claro'; ?>">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid d-flex align-items-center position-relative">
        <div class="collapse navbar-collapse" id="navbarNavAutenticado">
          <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="registar.php">Registar</a></li>
          <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
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