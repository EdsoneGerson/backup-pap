<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['autenticado'])){
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sobre nós</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php require_once('inc/menu.php'); ?>
    <main class="container-fluid">
        <section class="row">
            <div class="col-sm-12 col-lg-10 text-center mx-auto">
                <section class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <h1 class="mb-4"><b>Sobre Nós</b></h1>
                            <p class="fs-5">
                                Meu nome é <strong>Edson Filho</strong>, sou natural do <strong>Brasil</strong>, tenho <strong>19 anos</strong> neste momento.
                            </p>
                            <p class="fs-5">
                                Meu nome é <strong>Gerson Monteiro</strong>, sou natural da <strong>Ilha de Santiago</strong> em <strong>Cabo Verde</strong> e tenho <strong>20 anos</strong> neste momento.
                            </p>
                        </div>
                    </div>
                </section>

            </div>
        </section>
        <!-- não alterar nada abaixo desta linha -->
    </main>
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>